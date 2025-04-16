<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $para = "contacto@caeti.com.mx";  // 

    // Asunto del correo
    $asunto = "Mensaje: $company";

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
