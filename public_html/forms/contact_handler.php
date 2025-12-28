<?php
/**
 * Favlyo Contact Form Handler
 * Sends email to info@favlyo.com
 */

// Start session for CSRF protection
session_start();

// Set headers for JSON response
header('Content-Type: application/json');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// CSRF Token Validation
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid security token. Please refresh and try again.']);
    exit;
}

// Sanitize and validate inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Get form data
$name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
$subject = isset($_POST['subject']) ? sanitize_input($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please enter a valid name (at least 2 characters)';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

if (!empty($phone) && !preg_match('/^[0-9]{10,15}$/', preg_replace('/[\s\-\(\)]/', '', $phone))) {
    $errors[] = 'Please enter a valid phone number';
}

if (empty($subject) || strlen($subject) < 3) {
    $errors[] = 'Please enter a subject (at least 3 characters)';
}

if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Please enter a message (at least 10 characters)';
}

// If validation errors exist
if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode('<br>', $errors)]);
    exit;
}

// Email configuration
$to = 'info@favlyo.com';
$email_subject = "Favlyo Contact: " . $subject;

// Build email body
$email_body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 20px; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 10px 10px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #667eea; }
        .value { margin-top: 5px; }
        .footer { margin-top: 20px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2 style='margin:0;'>New Contact Form Submission</h2>
            <p style='margin:5px 0 0 0;'>From Favlyo Website</p>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>Name:</div>
                <div class='value'>{$name}</div>
            </div>
            <div class='field'>
                <div class='label'>Email:</div>
                <div class='value'><a href='mailto:{$email}'>{$email}</a></div>
            </div>
            <div class='field'>
                <div class='label'>Phone:</div>
                <div class='value'>" . ($phone ?: 'Not provided') . "</div>
            </div>
            <div class='field'>
                <div class='label'>Subject:</div>
                <div class='value'>{$subject}</div>
            </div>
            <div class='field'>
                <div class='label'>Message:</div>
                <div class='value'>" . nl2br($message) . "</div>
            </div>
            <div class='footer'>
                <p>This email was sent from the Favlyo contact form.</p>
                <p>Received on: " . date('F j, Y \a\t g:i A') . "</p>
                <p>IP Address: " . $_SERVER['REMOTE_ADDR'] . "</p>
            </div>
        </div>
    </div>
</body>
</html>
";

// Email headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: Favlyo Website <noreply@favlyo.com>\r\n";
$headers .= "Reply-To: {$name} <{$email}>\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
$mail_sent = @mail($to, $email_subject, $email_body, $headers);

if ($mail_sent) {
    // Send auto-reply to customer
    $auto_reply_subject = "Thank you for contacting Favlyo!";
    $auto_reply_body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 30px; border-radius: 10px 10px 0 0; text-align: center; }
        .content { background: #fff; padding: 30px; border: 1px solid #eee; border-top: none; }
        .footer { background: #f9f9f9; padding: 20px; border-radius: 0 0 10px 10px; text-align: center; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1 style='margin:0;'>FAVLYO</h1>
            <p style='margin:10px 0 0 0;'>India's Premier Fashion Platform</p>
        </div>
        <div class='content'>
            <h2>Hi {$name},</h2>
            <p>Thank you for reaching out to us! We have received your message and will get back to you as soon as possible.</p>
            <p><strong>Your message details:</strong></p>
            <p><em>Subject: {$subject}</em></p>
            <p>Our team typically responds within 24-48 hours during business days.</p>
            <p>In the meantime, feel free to explore our website or connect with us on WhatsApp for instant support.</p>
            <p>Best regards,<br><strong>Team Favlyo</strong></p>
        </div>
        <div class='footer'>
            <p>&copy; " . date('Y') . " Favlyo. All rights reserved.</p>
            <p>Hyderabad, India | info@favlyo.com</p>
        </div>
    </div>
</body>
</html>
";
    
    $auto_headers = "MIME-Version: 1.0\r\n";
    $auto_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $auto_headers .= "From: Favlyo <info@favlyo.com>\r\n";
    
    @mail($email, $auto_reply_subject, $auto_reply_body, $auto_headers);
    
    echo json_encode(['status' => 'success', 'message' => 'Thank you! Your message has been sent successfully. We will get back to you soon.']);
} else {
    error_log("Contact form email failed to send. To: {$to}, From: {$email}");
    echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error sending your message. Please try again or contact us directly at info@favlyo.com']);
}
?>
