<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $cardNumber = $_POST["cardNumber"];
    $message = $_POST["message"];
    $cuotas = $_POST["cuotas"];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Disable debugging (SMTP::DEBUG_SERVER for debugging)
        $mail->isSMTP();                     // Send using SMTP
        $mail->Host       = 'smtp.live.com'; // Hotmail/Outlook SMTP server
        $mail->SMTPAuth   = true;            // Enable SMTP authentication
        $mail->Username   = 'adanchugonzalo@hotmail.com'; // Your Hotmail/Outlook email address
        $mail->Password   = 'ctam123';       // Your Hotmail/Outlook email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption
        $mail->Port       = 587;             // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('adanchugonzalo@hotmail.com'); // Recipient's email address
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'New Form Submission from CTAM Website';
        $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Card Number: $cardNumber<br>Message: $message<br>Cuotas: $cuotas";
        $mail->AltBody = "Name: $name\nEmail: $email\nPhone: $phone\nCard Number: $cardNumber\nMessage: $message\nCuotas: $cuotas";

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'error';
}
?>
