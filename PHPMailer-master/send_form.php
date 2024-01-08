<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Disable debugging (SMTP::DEBUG_SERVER for debugging)
    $mail->isSMTP();                     // Send using SMTP
    $mail->Host       = 'smtp.live.com'; // Hotmail/Outlook SMTP server
    $mail->SMTPAuth   = true;            // Enable SMTP authentication
    $mail->Username   = 'adanchugonzalo@hotmail.com'; // Your Hotmail/Outlook email address
    $mail->Password   = 'ctam123'           // Your Hotmail/Outlook email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption
    $mail->Port       = 587;             // TCP port to connect to

    // Recipients
    $mail->setFrom('your_hotmail_username@hotmail.com', 'Your Name');
    $mail->addAddress('adanchugonzalo@hotmail.com'); // Recipient's email address
    $mail->addReplyTo('your_hotmail_username@hotmail.com', 'Your Name');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
