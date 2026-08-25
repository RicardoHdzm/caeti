<?php
// Quita saltos de línea/retorno de carro para evitar inyección de cabeceras de correo
function sanitizar_linea($valor) {
    return trim(str_replace(["\r", "\n"], '', $valor));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $nombre = htmlspecialchars(sanitizar_linea($_POST['name'] ?? ''));
    $company = htmlspecialchars(sanitizar_linea($_POST['company'] ?? ''));
    $email = filter_var(sanitizar_linea($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(sanitizar_linea($_POST['phone'] ?? ''));
    $mensaje = htmlspecialchars($_POST['mensaje'] ?? '');

    if (!$email || $nombre === '' || $company === '') {
        http_response_code(400);
        echo "Datos del formulario inválidos.";
        exit;
    }

    $para = "contacto@caeti.com.mx";
    $asunto = "Website: Nuevo Correo de: $company";

    $cuerpo = "Nombre: $nombre\nCorreo electrónico: $email\nTeléfono: $phone\nMensaje: \n$mensaje";
    $headers = "From: no-reply@caeti.com.mx\r\nReply-To: $email";

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
