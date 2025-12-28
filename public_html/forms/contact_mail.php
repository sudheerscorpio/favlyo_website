<?php

/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'sudheer.startup@gmail.com';

// if (file_exists($php_email_form = '../assets/vendor/php-email-form/phpEmailer_01.php')) {
//   include($php_email_form);
// } else {
//   die('Unable to load the "PHP Email Form" Library!');
// }

// $contact = new PHP_Email_Form;
// $contact->ajax = true;

// $contact->to = $receiving_email_address;
// $contact->from_name = $_POST['name'];
// $contact->from_email = $_POST['email'];
// $contact->subject = $_POST['subject'];
// $contact->message = $_POST['message'];

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = "sudheer.startup@gmail.com";
$subject = "Mail From FAVLYO";

$headers = "From: " . $name . "\r\n" .
  "CC: info@favlo.com";

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

// $contact->smtp = array(
//   'Host' => 'localhost',
//   'Connection' => 'None',
//   'SMTP Authentication' => 'False',
//   'port' => '25'
// );

$text = "You have received an e-mail from " . $name . "\r\nEmail: "
  . $email . "\r\nMessage: " . $message;

// $contact->add_message($_POST['name'], 'From');
// $contact->add_message($_POST['email'], 'Email');
// $contact->add_message($_POST['message'], 'Message', 10);

// $headers = "From: " . $name . "\r\n" .
//   "CC: info@favlo.com";

if ($contact_mail != NULL) {
  mail($to, $subject, $text, $headers);

}


// echo $contact->send();
?>