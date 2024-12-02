<?php
$to = 'karamatedatar@gmail.com';
$subject = 'Mail sent from sendmail PHP script';
$message = 'Text content from sendmail code.';
// Sendmail in PHP using mail()
if (mail($to, $subject, $message)) {
    echo 'Mail sent successfully.';
} else {
    echo 'Unable to send mail. Please try again.';
}
?>