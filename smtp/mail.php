<?php
include('smtp/PHPMailerAutoload.php');
// Include PHPMailer autoloader
//require 'vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Configure SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = false;
$mail->Username = 'shahenshahegujarat@gmail.com';
$mail->Password = 'Saiyed@12345';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set email content
$mail->setFrom('shahenshahegujarat@gmail.com', 'Sender Name');
$mail->addAddress('jigarpatel.comp786@gmail.com', 'Recipient Name');
$mail->Subject = 'Email subject';
$mail->isHTML(true);
$mail->Body = '<html><body><h1>This is an HTML email</h1><p>This is some HTML content</p></body></html>';

// Send the email
if ($mail->send()) {
    echo 'Email sent successfully';
} else {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
?>