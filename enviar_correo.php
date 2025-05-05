<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $para = "contacto@caeti.com.mx";
    $asunto = "Website: Nuevo Correo de: $company";

    $cuerpo = "Nombre: $nombre\nCorreo electrónico: $email\nTeléfono: $phone\nMensaje: \n$mensaje";
    $headers = "From: $email";

    // Enviamos el correo
    if (mail($para, $asunto, $cuerpo, $headers)) {
        // Redireccionar si el correo fue enviado exitosamente
        header("Location: https://caeti.com.mx/");
        exit;
    } else {
        echo "Hubo un error al enviar el correo.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
