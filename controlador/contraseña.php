<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnrecuperar"])) {
    // Obtén el correo electrónico proporcionado por el usuario
    $correo = $_POST["correo"];

    // Aquí deberías tener lógica para validar el correo electrónico y buscar en tu base de datos

    // Enviar correo electrónico
    $asunto = "Recuperación de Contraseña";
    $mensaje = "Hola,\n\nHas solicitado recuperar tu contraseña. Haz clic en el siguiente enlace para restablecerla:\n\nhttps://mail.google.com/mail/u/0/#inbox/restablecer.php\n\nSi no solicitaste esto, puedes ignorar este correo.\n\nGracias.";

    // El encabezado del correo electrónico
    $headers = "From: guzman.valle.adrina.16@gmail.com" . "\r\n" .
               "Reply-To: guzman.valle.adrina.16@gmail.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    mail($correo, $asunto, $mensaje, $headers);

    // Puedes redirigir al usuario a una página de confirmación
    header("Location: confirmacion.php");
    exit;
}
?>
