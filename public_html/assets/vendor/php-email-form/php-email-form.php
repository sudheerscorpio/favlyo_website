<?php
if (isset($_POST['submit'])) {
  // Set the recipient email address
  $toEmail = "info@favlyo.com";

  // Get form values
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Construct email message
  $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

  // Send email
  /* mail($toEmail, $subject, $body, "From: $email"); */

  if (mail($toEmail, $subject, $body, "From: $email")) {
    echo "<p>Thank you for contacting us, " . $name . ". We will get back to you soon!</p>";
  } else {
    echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
  }
}

// Redirect to thank-you page
// header("Location: thankyou.html"); 
?>