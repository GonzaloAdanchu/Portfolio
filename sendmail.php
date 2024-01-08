<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $cardNumber = $_POST["cardNumber"];
    $message = $_POST["message"];
    $cuotas = $_POST["cuotas"];

    // Compose the email message
    $subject = "Consulta desde el formulario de contacto";
    $body = "Nombres: $name\n";
    $body .= "Email: $email\n";
    $body .= "Celular: $phone\n";
    $body .= "Nº Tarjeta CTAM: $cardNumber\n";
    $body .= "Mensaje adicional: $message\n";
    $body .= "Cuotas: $cuotas\n";

    // Set the recipient email address
    $to = "adanchugonzalo@hotmail.com";  // Change this to your actual email address

    // Set additional headers
    $headers = "From: $email" . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "success";  // This message will be displayed in the HTML page
    } else {
        echo "error";  // This message will be displayed in the HTML page
    }
} else {
    header("Location: index.html");  // Redirect to the home page if accessed directly
}
?>
