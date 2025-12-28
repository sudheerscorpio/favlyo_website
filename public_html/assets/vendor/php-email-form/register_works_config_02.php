<?php
/**
 * Favlyo Registration Form Handler - SECURE VERSION
 * Features: SQL Injection prevention, XSS protection, CSRF, Rate limiting, Honeypot, Input validation
 */

// Strict error handling
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Start secure session
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
    ini_set('session.use_strict_mode', 1);
    session_start();
}

require_once __DIR__ . '/../../../../config.php';

// ============================================
// SECURITY FUNCTIONS
// ============================================

/**
 * Sanitize input - XSS prevention
 */
function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $data = str_replace(chr(0), '', $data); // Remove null bytes
    return $data;
}

/**
 * Get sanitized POST value
 */
function get($key) {
    return isset($_POST[$key]) ? sanitize(trim($_POST[$key])) : '';
}

/**
 * Validate name - letters, spaces, dots, hyphens, apostrophes only
 */
function validate_name($name) {
    return preg_match("/^[a-zA-Z\s.'-]{2,100}$/u", $name);
}

/**
 * Validate email with DNS check
 */
function validate_email($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    // Check if domain exists
    $domain = substr(strrchr($email, "@"), 1);
    if (!checkdnsrr($domain, "MX") && !checkdnsrr($domain, "A")) {
        return false;
    }
    return true;
}

/**
 * Validate phone - exactly 10 digits
 */
function validate_phone($phone) {
    return preg_match('/^\d{10}$/', $phone);
}

/**
 * Validate age - 16 to 99
 */
function validate_age($age) {
    $age = intval($age);
    return $age >= 16 && $age <= 99;
}

/**
 * Validate pincode - 6 digits
 */
function validate_pincode($pincode) {
    return preg_match('/^\d{6}$/', $pincode);
}

/**
 * Validate select options against allowed values
 */
function validate_option($value, $allowed) {
    return in_array($value, $allowed);
}

/**
 * Get client IP
 */
function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ips[0]);
    }
    return filter_var($ip, FILTER_VALIDATE_IP) ?: 'unknown';
}

/**
 * Rate limiting
 */
function check_rate_limit($ip, $pdo, $limit = 3, $window = 600) {
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM registrations WHERE ip_address = ? AND datetime > DATE_SUB(NOW(), INTERVAL ? SECOND)");
        $stmt->execute([$ip, $window]);
        return $stmt->fetchColumn() < $limit;
    } catch (PDOException $e) {
        return true;
    }
}

/**
 * Check for spam patterns
 */
function is_spam($data) {
    $spam_patterns = [
        '/\b(viagra|cialis|casino|lottery|bitcoin|crypto|porn|sex)\b/i',
        '/(http[s]?:\/\/[^\s]+){2,}/i',
        '/(.)\1{8,}/',
    ];
    $content = is_array($data) ? implode(' ', $data) : $data;
    foreach ($spam_patterns as $pattern) {
        if (preg_match($pattern, $content)) {
            return true;
        }
    }
    return false;
}

// ============================================
// MAIN PROCESSING
// ============================================

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request.";
    exit;
}

// CSRF token check (timing-safe comparison)
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    echo "Security validation failed. Please refresh and try again.";
    exit;
}

// Honeypot check - hidden fields bots fill
if (!empty($_POST['website']) || !empty($_POST['fax']) || !empty($_POST['company'])) {
    echo "success"; // Fake success for bots
    exit;
}

// Time-based check
if (isset($_SESSION['form_loaded']) && (time() - $_SESSION['form_loaded']) < 5) {
    echo "Please take your time filling the form.";
    exit;
}

// Setup secure PDO connection
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false, // Real prepared statements = SQL injection safe
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    error_log("Registration DB error: " . $e->getMessage());
    echo "Service temporarily unavailable.";
    exit;
}

// Get client IP
$ip_address = get_client_ip();

// Rate limiting
if (!check_rate_limit($ip_address, $pdo)) {
    echo "Too many registration attempts. Please try again later.";
    exit;
}

// ============================================
// COLLECT AND VALIDATE DATA
// ============================================

// Allowed values for select fields
$allowed_roles = ['Stitcher', 'Tailor', 'Cutting Master', 'Drapist', 'Creative Designer', 'Weaver'];
$allowed_experience = ['Fresher', '0-3 Years', '3-6 Years', '7-10 Years', '11-14 Years', 'Above 15 Years'];
$allowed_work_types = ['Hourly', 'Per Day', 'Weekly', 'Monthly', 'Yearly'];
$allowed_join_times = ['Immediately', 'In a Week', 'In a Month', 'In 3 Months'];
$allowed_yes_no = ['Yes', 'No'];
$allowed_genders = ['Male', 'Female'];

// Collect data
$name = get('name');
$email = filter_var(get('email'), FILTER_SANITIZE_EMAIL);
$phone = preg_replace('/\D/', '', get('phone')); // Keep only digits
$role = get('role');
$experience = get('experience');
$work_type = isset($_POST['work_type']) && is_array($_POST['work_type']) 
    ? implode(',', array_filter(array_map('sanitize', $_POST['work_type']), function($v) use ($allowed_work_types) { return in_array($v, $allowed_work_types); }))
    : '';
$join_time = get('join_time');
$training = get('training');
$area = get('area');
$city = get('city');
$state = get('state');
$pincode = preg_replace('/\D/', '', get('pincode'));
$interview_ready = get('interview_ready');
$gender = get('gender');
$age = intval(get('age'));
$languages = isset($_POST['languages']) && is_array($_POST['languages']) 
    ? implode(',', array_map('sanitize', $_POST['languages']))
    : '';
$vehicle = get('vehicle');
$know_about = substr(get('know_about'), 0, 100);
$referral_code = substr(get('referral_code'), 0, 50);
$alt_phone = preg_replace('/\D/', '', get('alt_phone'));

// ============================================
// VALIDATION
// ============================================

$errors = [];

if (!validate_name($name)) {
    $errors[] = "Invalid name (2-100 letters only)";
}
if (!validate_email($email)) {
    $errors[] = "Invalid email address";
}
if (!validate_phone($phone)) {
    $errors[] = "Invalid phone (10 digits required)";
}
if (!validate_age($age)) {
    $errors[] = "Invalid age (16-99)";
}
if (!validate_pincode($pincode)) {
    $errors[] = "Invalid PIN code (6 digits)";
}
if (!validate_option($role, $allowed_roles)) {
    $errors[] = "Invalid role selection";
}
if (!validate_option($experience, $allowed_experience)) {
    $errors[] = "Invalid experience selection";
}
if (!validate_option($join_time, $allowed_join_times)) {
    $errors[] = "Invalid availability selection";
}
if (!validate_option($training, $allowed_yes_no)) {
    $errors[] = "Invalid training selection";
}
if (!validate_option($interview_ready, $allowed_yes_no)) {
    $errors[] = "Invalid interview ready selection";
}
if (!validate_option($gender, $allowed_genders)) {
    $errors[] = "Invalid gender selection";
}
if (!validate_option($vehicle, $allowed_yes_no)) {
    $errors[] = "Invalid vehicle selection";
}
if (empty($area) || strlen($area) < 2) {
    $errors[] = "Area is required";
}
if (empty($city)) {
    $errors[] = "City is required";
}
if (empty($state)) {
    $errors[] = "State is required";
}
if (empty($work_type)) {
    $errors[] = "Work type is required";
}
if (empty($languages)) {
    $errors[] = "Languages are required";
}

// Spam check
if (is_spam([$name, $email, $area, $know_about])) {
    error_log("SPAM registration attempt - IP: $ip_address, Email: $email");
    echo "Your submission was flagged. Please try again.";
    exit;
}

if (!empty($errors)) {
    echo implode(". ", $errors);
    exit;
}

// ============================================
// CHECK DUPLICATES (using prepared statements)
// ============================================
$stmt = $pdo->prepare("SELECT COUNT(*) FROM registrations WHERE email = ? OR phone = ?");
$stmt->execute([$email, $phone]);
if ($stmt->fetchColumn() > 0) {
    echo "This email or phone number is already registered.";
    exit;
}

// ============================================
// INSERT (SQL Injection Safe - Prepared Statements)
// ============================================
$datetime = date('Y-m-d H:i:s');
$user_agent = substr(sanitize($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 500);

try {
    $stmt = $pdo->prepare("INSERT INTO registrations 
        (datetime, name, email, phone, role, experience, work_type, join_time, training, area, city, state, pincode, interview_ready, gender, age, languages, vehicle, know_about, referral_code, alt_phone, ip_address, user_agent)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->execute([
        $datetime,
        $name,
        $email,
        $phone,
        $role,
        $experience,
        $work_type,
        $join_time,
        $training,
        $area,
        $city,
        $state,
        $pincode,
        $interview_ready,
        $gender,
        $age,
        $languages,
        $vehicle,
        $know_about,
        $referral_code,
        $alt_phone,
        $ip_address,
        $user_agent
    ]);
    
    $registration_id = $pdo->lastInsertId();
    
} catch (PDOException $e) {
    error_log("Registration insert error: " . $e->getMessage());
    echo "Registration failed. Please try again.";
    exit;
}

// ============================================
// SEND CONFIRMATION EMAIL
// ============================================
$to = $email;
$subject = "Welcome to Favlyo - Registration #" . $registration_id;
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Favlyo <noreply@favlyo.com>\r\n";

$message = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f8fafc; margin: 0; padding: 20px; }
        .card { background: #fff; border-radius: 16px; box-shadow: 0 4px 20px rgba(102,126,234,0.15); padding: 0; max-width: 500px; margin: auto; overflow: hidden; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .title { font-size: 24px; font-weight: 700; margin: 0; }
        .subtitle { margin: 10px 0 0 0; opacity: 0.9; }
        .id-badge { background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; display: inline-block; margin-top: 15px; font-size: 14px; }
        .info { background: #f8fafc; border-radius: 10px; padding: 15px; margin: 20px 0; }
        .btn { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff !important; padding: 14px 35px; border-radius: 30px; text-decoration: none; font-weight: 600; margin-top: 20px; }
        .footer { color: #888; font-size: 14px; margin-top: 25px; padding-top: 20px; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class='card'>
        <div class='header'>
            <div class='title'>Welcome to Favlyo! 🎉</div>
            <div class='subtitle'>Your registration is complete</div>
            <div class='id-badge'>Registration #" . $registration_id . "</div>
        </div>
        <div class='content'>
            <p>Hi <strong>" . htmlspecialchars($name) . "</strong>,</p>
            <p>Thank you for joining the <strong>Favlyo</strong> community! We're excited to have you on board.</p>
            
            <div class='info'>
                <p style='margin:0;'><strong>📋 Quick Summary:</strong></p>
                <p style='margin:5px 0;'>Role: " . htmlspecialchars($role) . "</p>
                <p style='margin:5px 0;'>Experience: " . htmlspecialchars($experience) . "</p>
                <p style='margin:5px 0;'>Location: " . htmlspecialchars($city) . ", " . htmlspecialchars($state) . "</p>
            </div>
            
            <p>Our team will review your profile and connect you with relevant opportunities soon.</p>
            
            <center><a href='https://favlyo.com' class='btn'>Explore Favlyo</a></center>
            
            <div class='footer'>
                <p>Questions? Reply to this email or WhatsApp us at +91 6309989019</p>
                <p><strong>Team Favlyo</strong></p>
            </div>
        </div>
    </div>
</body>
</html>
";

@mail($to, $subject, $message, $headers);

// Send notification to admin
$admin_subject = "New Registration #" . $registration_id . " - " . $name;
$admin_body = "New registration received:\n\nID: #$registration_id\nName: $name\nEmail: $email\nPhone: $phone\nRole: $role\nCity: $city, $state\nIP: $ip_address\nTime: $datetime";
@mail('info@favlyo.com', $admin_subject, $admin_body, "From: Favlyo <noreply@favlyo.com>");

// Clear CSRF token
unset($_SESSION['csrf_token']);

echo "success";
exit;
exit; // Stop script execution immediately after echoing success