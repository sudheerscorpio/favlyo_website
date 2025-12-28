<?php

require_once './PHPMailer/PHPMailer.php';
require_once './PHPMailerSMTP.php';
require_once './PHPMailer/Exception.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set up the email
    $to = "info@fav"; // Enter your email address here
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>