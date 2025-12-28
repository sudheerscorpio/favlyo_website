<?php
/**
 * Favlyo Contact Form Handler - SECURE VERSION with DB Storage
 * Features: Database storage, CSRF, Rate limiting, Honeypot, XSS/SQL injection protection
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

// Security headers
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../assets/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/../assets/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../assets/vendor/phpmailer/phpmailer/src/SMTP.php';

// Load database config (in parent of public_html)
require_once __DIR__ . '/../../config.php';

// ============================================
// HOSTINGER SMTP CONFIGURATION
// ============================================
$smtp_config = [
    'host'       => 'smtp.hostinger.com',
    'port'       => 465,
    'username'   => 'info@favlyo.com',
    'password'   => 'YOUR_EMAIL_PASSWORD_HERE',  // ⚠️ CHANGE THIS
    'encryption' => 'ssl',
    'from_email' => 'info@favlyo.com',
    'from_name'  => 'Favlyo Website',
    'to_email'   => 'info@favlyo.com',
];

// ============================================
// SECURITY FUNCTIONS
// ============================================

/**
 * Sanitize input - prevents XSS attacks
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
 * Validate email strictly with DNS check
 */
function validate_email_strict($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    $domain = substr(strrchr($email, "@"), 1);
    if (!checkdnsrr($domain, "MX") && !checkdnsrr($domain, "A")) {
        return false;
    }
    return $email;
}

/**
 * Rate limiting - prevent spam/brute force
 */
function check_rate_limit($ip, $pdo, $limit = 5, $window = 300) {
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM contact_submissions WHERE ip_address = ? AND created_at > DATE_SUB(NOW(), INTERVAL ? SECOND)");
        $stmt->execute([$ip, $window]);
        return $stmt->fetchColumn() < $limit;
    } catch (PDOException $e) {
        return true; // Allow if table doesn't exist yet
    }
}

/**
 * Check for spam patterns
 */
function is_spam($message, $name, $email) {
    $spam_patterns = [
        '/\b(viagra|cialis|casino|lottery|winner|bitcoin|crypto|investment|loan|mortgage|sex|porn)\b/i',
        '/\b(click here|act now|limited time|free money|make money fast|earn money)\b/i',
        '/(http[s]?:\/\/[^\s]+){3,}/i', // Multiple URLs = spam
        '/(.)\1{10,}/', // Repeated characters
        '/[\x00-\x1F\x7F]/u', // Control characters
    ];
    
    $content = $message . ' ' . $name . ' ' . $email;
    foreach ($spam_patterns as $pattern) {
        if (preg_match($pattern, $content)) {
            return true;
        }
    }
    return false;
}

/**
 * Get real client IP
 */
function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ips[0]);
    }
    return filter_var($ip, FILTER_VALIDATE_IP) ?: 'unknown';
}

// ============================================
// MAIN PROCESSING
// ============================================

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

// CSRF Token Validation (timing-safe comparison)
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Security validation failed. Please refresh and try again.']);
    exit;
}

// Honeypot check - hidden fields that bots fill
if (!empty($_POST['website']) || !empty($_POST['fax']) || !empty($_POST['company'])) {
    echo json_encode(['status' => 'success', 'message' => 'Thank you!']); // Fake success for bots
    exit;
}

// Time-based check - form submitted too fast = bot
if (isset($_SESSION['form_loaded']) && (time() - $_SESSION['form_loaded']) < 3) {
    echo json_encode(['status' => 'error', 'message' => 'Please take your time filling the form.']);
    exit;
}

// Setup secure database connection
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false, // Real prepared statements
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    error_log("Contact DB error: " . $e->getMessage());
    // Continue without DB if connection fails
    $pdo = null;
}

// Get client IP
$ip_address = get_client_ip();

// Rate limiting
if ($pdo && !check_rate_limit($ip_address, $pdo)) {
    http_response_code(429);
    echo json_encode(['status' => 'error', 'message' => 'Too many requests. Please wait a few minutes.']);
    exit;
}

// Sanitize inputs
$name = sanitize($_POST['name'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$phone = sanitize($_POST['phone'] ?? '');
$subject = sanitize($_POST['subject'] ?? '');
$message = sanitize($_POST['message'] ?? '');

// Validation
$errors = [];

if (empty($name) || strlen($name) < 2 || strlen($name) > 100) {
    $errors[] = 'Please enter a valid name (2-100 characters)';
}
if (!preg_match("/^[a-zA-Z\s.'-]+$/u", $name)) {
    $errors[] = 'Name contains invalid characters';
}

$validated_email = validate_email_strict($email);
if (!$validated_email) {
    $errors[] = 'Please enter a valid email address';
} else {
    $email = $validated_email;
}

if (!empty($phone)) {
    $phone_clean = preg_replace('/[\s\-\(\)]/', '', $phone);
    if (!preg_match('/^[0-9]{10,15}$/', $phone_clean)) {
        $errors[] = 'Please enter a valid phone number';
    }
}

if (empty($subject) || strlen($subject) < 3 || strlen($subject) > 200) {
    $errors[] = 'Please enter a subject (3-200 characters)';
}

if (empty($message) || strlen($message) < 10 || strlen($message) > 5000) {
    $errors[] = 'Please enter a message (10-5000 characters)';
}

// Spam check
if (is_spam($message, $name, $email)) {
    error_log("SPAM detected - IP: $ip_address, Email: $email");
    echo json_encode(['status' => 'error', 'message' => 'Your message was flagged. Please revise and try again.']);
    exit;
}

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode('<br>', $errors)]);
    exit;
}

// Get metadata
$user_agent = substr(sanitize($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 500);
$referer = substr(sanitize($_SERVER['HTTP_REFERER'] ?? ''), 0, 500);

// ============================================
// SAVE TO DATABASE (SQL Injection Safe)
// ============================================
$submission_id = null;
if ($pdo) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO contact_submissions 
            (name, email, phone, subject, message, ip_address, user_agent, referer, status, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'new', NOW())
        ");
        $stmt->execute([$name, $email, $phone, $subject, $message, $ip_address, $user_agent, $referer]);
        $submission_id = $pdo->lastInsertId();
    } catch (PDOException $e) {
        error_log("Contact DB insert error: " . $e->getMessage());
    }
}

// ============================================
// SEND EMAIL
// ============================================
$email_body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 25px; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 25px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 10px 10px; }
        .field { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .label { font-weight: bold; color: #667eea; font-size: 12px; text-transform: uppercase; }
        .value { margin-top: 5px; font-size: 15px; }
        .id-badge { background: #667eea; color: #fff; padding: 3px 8px; border-radius: 4px; font-size: 11px; }
        .footer { margin-top: 20px; font-size: 11px; color: #999; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2 style='margin:0;'>📬 New Contact Form Message</h2>
            <p style='margin:5px 0 0 0;'>DB Reference: <span class='id-badge'>#" . ($submission_id ?: 'N/A') . "</span></p>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>👤 Name</div>
                <div class='value'>" . htmlspecialchars($name) . "</div>
            </div>
            <div class='field'>
                <div class='label'>📧 Email</div>
                <div class='value'><a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></div>
            </div>
            <div class='field'>
                <div class='label'>📱 Phone</div>
                <div class='value'>" . ($phone ?: 'Not provided') . "</div>
            </div>
            <div class='field'>
                <div class='label'>📝 Subject</div>
                <div class='value'>" . htmlspecialchars($subject) . "</div>
            </div>
            <div class='field'>
                <div class='label'>💬 Message</div>
                <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
            </div>
            <div class='footer'>
                <p>📅 " . date('F j, Y \a\t g:i A') . " | 🌐 IP: " . htmlspecialchars($ip_address) . "</p>
                <p>✅ Saved in database with ID #" . ($submission_id ?: 'N/A') . "</p>
            </div>
        </div>
    </div>
</body>
</html>
";

$mail = new PHPMailer(true);
$mail_sent = false;

try {
    $mail->isSMTP();
    $mail->Host       = $smtp_config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_config['username'];
    $mail->Password   = $smtp_config['password'];
    $mail->SMTPSecure = ($smtp_config['encryption'] === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtp_config['port'];
    $mail->CharSet    = 'UTF-8';
    
    $mail->setFrom($smtp_config['from_email'], $smtp_config['from_name']);
    $mail->addAddress($smtp_config['to_email']);
    $mail->addReplyTo($email, $name);
    
    $mail->isHTML(true);
    $mail->Subject = "Favlyo Contact #" . ($submission_id ?: 'N/A') . ": " . $subject;
    $mail->Body    = $email_body;
    $mail->AltBody = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nSubject: {$subject}\nMessage: {$message}";
    
    $mail->send();
    $mail_sent = true;
    
    // Send auto-reply
    try {
        $auto_mail = new PHPMailer(true);
        $auto_mail->isSMTP();
        $auto_mail->Host       = $smtp_config['host'];
        $auto_mail->SMTPAuth   = true;
        $auto_mail->Username   = $smtp_config['username'];
        $auto_mail->Password   = $smtp_config['password'];
        $auto_mail->SMTPSecure = ($smtp_config['encryption'] === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $auto_mail->Port       = $smtp_config['port'];
        $auto_mail->CharSet    = 'UTF-8';
        
        $auto_mail->setFrom($smtp_config['from_email'], 'Favlyo');
        $auto_mail->addAddress($email, $name);
        
        $auto_mail->isHTML(true);
        $auto_mail->Subject = "Thank you for contacting Favlyo! [Ref #" . ($submission_id ?: 'N/A') . "]";
        $auto_mail->Body = "
        <!DOCTYPE html>
        <html>
        <body style='font-family: Arial, sans-serif;'>
            <div style='max-width: 600px; margin: 0 auto;'>
                <div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 30px; border-radius: 10px 10px 0 0; text-align: center;'>
                    <h1 style='margin:0;'>FAVLYO</h1>
                    <p style='margin:10px 0 0 0;'>India's Premier Fashion Platform</p>
                </div>
                <div style='background: #fff; padding: 30px; border: 1px solid #eee;'>
                    <h2 style='color: #667eea;'>Hi " . htmlspecialchars($name) . "! 👋</h2>
                    <p>Thank you for reaching out! We've received your message and will respond within <strong>24-48 hours</strong>.</p>
                    <p><strong>Reference:</strong> #" . ($submission_id ?: 'N/A') . "</p>
                    <p><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>
                    <p>Need immediate help? <a href='https://wa.me/916309989019' style='color: #667eea;'>Chat on WhatsApp</a></p>
                    <p>Best regards,<br><strong>Team Favlyo</strong></p>
                </div>
                <div style='background: #f5f5f5; padding: 15px; text-align: center; font-size: 12px; color: #888; border-radius: 0 0 10px 10px;'>
                    <p>&copy; " . date('Y') . " Favlyo | Hyderabad, India</p>
                </div>
            </div>
        </body>
        </html>";
        $auto_mail->send();
    } catch (Exception $e) {
        error_log("Auto-reply failed: " . $e->getMessage());
    }
    
} catch (Exception $e) {
    error_log("Contact email failed: " . $mail->ErrorInfo);
}

// Update DB with email status
if ($pdo && $submission_id) {
    try {
        $stmt = $pdo->prepare("UPDATE contact_submissions SET email_sent = ? WHERE id = ?");
        $stmt->execute([$mail_sent ? 1 : 0, $submission_id]);
    } catch (PDOException $e) {
        error_log("DB update error: " . $e->getMessage());
    }
}

// Clear CSRF token
unset($_SESSION['csrf_token']);

// Response
if ($mail_sent || $submission_id) {
    echo json_encode([
        'status' => 'success', 
        'message' => 'Thank you! Your message has been sent. Reference #' . ($submission_id ?: 'N/A')
    ]);
} else {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Sorry, there was an error. Please contact us at info@favlyo.com'
    ]);
}
?>
