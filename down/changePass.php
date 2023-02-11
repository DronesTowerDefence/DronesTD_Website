<?php

session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);

$to      = 'scheunerttim@gmail.com';
$subject = 'Betreff';
$message = 'Nahcricht.';
$headers = 'From: webmaster@example.com'       . "\r\n" .
             'Reply-To: webmaster@example.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



echo "1";








?>