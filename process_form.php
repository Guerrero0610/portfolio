<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de campos
    $name = clean_input($_POST["Name"]);
    $email = clean_input($_POST["Email"]);
    $mobileNumber = clean_input($_POST["Mobile_number"]);
    $message = clean_input($_POST["Message"]);

    // Validación adicional si es necesario
    if (empty($name) || empty($email) || empty($mobileNumber) || empty($message)) {
        echo "Error: Todos los campos son obligatorios";
        exit;
    }

    // Configuración del destinatario del correo
    $to = "anggie.desarrollo@gmail.com";

    // Asunto del correo
    $subject = "Nuevo mensaje del formulario de contacto";

    // Cuerpo del correo
    $mailBody = "Nombre: $name\n";
    $mailBody .= "Email: $email\n";
    $mailBody .= "Número de teléfono: $mobileNumber\n";
    $mailBody .= "Mensaje:\n$message";

    // Cabeceras del correo
    $headers = "From: $email";

    // Envía el correo
    $success = mail($to, $subject, $mailBody, $headers);

    // Manejo de errores y respuesta al cliente
    if ($success) {
        echo "Formulario enviado con éxito";
    } else {
        echo "Error al enviar el formulario. Por favor, intenta de nuevo más tarde.";
    }
}

// Función para limpiar los datos de entrada
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>