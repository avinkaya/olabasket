<?php
$to      = 'hsbn89@yahoo.co.id';
$subject = 'Uji Coba Email';
$message = 'hello';
$headers = 'From: heny@kavinkayu.com' . "\r\n" .
    'Reply-To: heny@kavinkayu.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>

