<?php
use PHPMailer\PHPMailer\PHPMailer;

session_start();


$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);

/*$to      = 'scheunerttim@gmail.com';
$subject = 'Betreff';
$message = 'Nahcricht.';
$headers = 'From: webmaster@example.com'       . "\r\n" .
             'Reply-To: webmaster@example.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
*/

$mail = new PHPMailer;

$mail->From = 'dronestd176065@web10925.cweb05.gamingcontrol.de';
$mail->FromName = 'Drones';
$mail->addAddress('scheunerttim@gmail.com');               // Name is optional


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


echo "1";








?>