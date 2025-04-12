<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $name = htmlspecialchars($_POST['name']); // Para evitar problemas con caracteres especiales
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $tema = htmlspecialchars($_POST['tema']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Dirección de correo a la que se enviará el mensaje
    $para = "jrhm95@gmail.com";  // Reemplaza con tu dirección de correo

    // Asunto del correo
    $asunto = "Mensaje: $tema";

    // Cuerpo del correo
    $cuerpo = "Nombre: $nombre\nCorreo electrónico: $email\nTeléfono: \n$phone\nMensaje: \n$mensaje";

    // Cabecera del correo
    $headers = "From: $email";  // Quién envía el correo

    // Enviamos el correo
    if (mail($para, $asunto, $cuerpo, $headers)) {
        echo "¡Correo enviado con éxito!";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
