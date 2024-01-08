<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $cardNumber = $_POST["cardNumber"];
    $message = $_POST["message"];
    $cuotas = $_POST["cuotas"];

    $to = "adanchugonzalo@hotmail.com"; // replace with your email address
    $subject = "New Form Submission from CTAM Website";

    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Card Number: $cardNumber\n";
    $email_body .= "Message: $message\n";
    $email_body .= "Cuotas: $cuotas\n";

    mail($to, $subject, $email_body);

    echo "Consulta enviada por favor, espere a ser contactado."; // or any message you want to send back to the form
} else {
    echo "error"; // or any error message
}
?>

