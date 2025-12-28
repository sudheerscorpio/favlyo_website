<?php
session_start();

require_once __DIR__ . '/../../../../../config.php';

// CSRF token check (add token to form and session)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo "Invalid CSRF token.";
    exit;
  }
}

// Database connection (now uses constants from config.php)
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];
try {
  $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (\PDOException $e) {
  error_log($e->getMessage());
  echo "Database connection failed.";
  exit;
}

// --- Helper: Strict input validation ---
function get($key)
{
  return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}
function validate_name($name)
{
  return preg_match('/^[a-zA-Z\s]{2,100}$/', $name);
}
function validate_email($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validate_phone($phone)
{
  return preg_match('/^\d{10}$/', $phone);
}
function validate_age($age)
{
  return preg_match('/^\d{2}$/', $age) && $age >= 16 && $age <= 99;
}

// --- Collect and validate POST data ---
$name = get('name');
$email = get('email');
$phone = get('phone');
$role = get('role');
$experience = get('experience');
$work_type = isset($_POST['work_type']) && is_array($_POST['work_type']) ? implode(',', array_map('trim', $_POST['work_type'])) : '';
$join_time = get('join_time');
$training = get('training');
$area = get('area');
$city = get('city');
$state = get('state');
$pincode = get('pincode');
$interview_ready = get('interview_ready');
$gender = get('gender');
$age = get('age');
$languages = isset($_POST['languages']) && is_array($_POST['languages']) ? implode(',', array_map('trim', $_POST['languages'])) : '';
$vehicle = get('vehicle');
$know_about = get('know_about');
$referral_code = get('referral_code');
$alt_phone = get('alt_phone');

// --- Validate critical fields ---
if (!validate_name($name)) {
  echo "Invalid name.";
  exit;
}
if (!validate_email($email)) {
  echo "Invalid email.";
  exit;
}
if (!validate_phone($phone)) {
  echo "Invalid phone number.";
  exit;
}
if (!validate_age($age)) {
  echo "Invalid age.";
  exit;
}
// Add more validation as needed for other fields

// --- Check for duplicate email or phone ---
$stmt = $pdo->prepare("SELECT COUNT(*) FROM registrations WHERE email = ? OR phone = ?");
$stmt->execute([$email, $phone]);
if ($stmt->fetchColumn() > 0) {
  echo "This email or mobile number is already registered.";
  exit;
}

// --- Insert registration securely ---
$datetime = date('Y-m-d H:i:s');
$stmt = $pdo->prepare("INSERT INTO registrations 
    (datetime, name, email, phone, role, experience, work_type, join_time, training, area, city, state, pincode, interview_ready, gender, age, languages, vehicle, know_about, referral_code, alt_phone)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
  $alt_phone
]);

// Send confirmation email to user
$to = $email;
$subject = "Welcome to Favlyo - Registration Successful!";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Favlyo <noreply@favlyo.com>" . "\r\n";

$message = "
<html>
<head>
  <style>
    body { font-family: 'Montserrat', 'Poppins', Arial, sans-serif; background: #f8fafc; }
    .card { background: #fff; border-radius: 16px; box-shadow: 0 4px 16px #e3e6f3; padding: 32px; max-width: 500px; margin: auto; }
    .title { color: #6c63ff; font-size: 1.5rem; font-weight: 700; margin-bottom: 12px; }
    .subtitle { color: #444; font-size: 1.1rem; margin-bottom: 24px; }
    .btn { display: inline-block; background: linear-gradient(90deg, #6c63ff 0%, #48c6ef 100%); color: #fff; padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-top: 24px; }
    .footer { color: #888; font-size: 0.95rem; margin-top: 32px; }
  </style>
</head>
<body>
  <div class='card'>
    <div class='title'>Welcome to Favlyo!</div>
    <div class='subtitle'>Hi " . htmlspecialchars($name) . ",<br><br>
      Thank you for registering with <strong>Favlyo</strong>.<br>
      Your registration was successful on <strong>" . $datetime . "</strong>.<br>
      We are excited to have you join our community!
    </div>
    <a href='https://favlyo.com' class='btn'>Explore Favlyo</a>
    <div class='footer'>
      If you have any questions, feel free to reply to this email.<br>
      <strong>Team Favlyo</strong>
    </div>
  </div>
</body>
</html>
";

mail($to, $subject, $message, $headers);

echo "success";