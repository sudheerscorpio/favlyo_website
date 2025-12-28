<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer Autoload
// require_once 'path/to/PHPMailer/src/PHPMailer.php';
// require_once 'path/to/PHPMailer/src/SMTP.php';
// require_once 'path/to/PHPMailer/src/Exception.php';

require_once './PHPMailer/PHPMailer.php';
require_once './PHPMailerSMTP.php';
require_once './PHPMailer/Exception.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'localhost'; // Enter your SMTP server here
    $mail->SMTPAuth = true;
    $mail->Username = 'yourname@example.com'; // Enter your email address here
    $mail->Password = 'your-email-password'; // Enter your email password here
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;

    // Sender and recipient details
    $mail->setFrom('info@favlyo.com', 'Favlyo');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Email subject and body
    $mail->Subject = 'New Email using PHPMailer';
    $mail->Body = 'This is a test email sent from PHPMailer.';

    // Send email
    $mail->send();
    echo '<p>Message has been sent successfully!</p>';
} catch (Exception $e) {
    echo '<p>Message could not be sent. Error: ' . $mail->ErrorInfo . '</p>';
}
?>