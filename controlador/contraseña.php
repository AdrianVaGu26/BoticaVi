<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnrecuperar"])) {
    $correo = $_POST["correo"];

    $asunto = "Recuperación de Contraseña";
    $mensaje = "Hola,\n\nHas solicitado recuperar tu contraseña. Haz clic en el siguiente enlace para restablecerla:\n\nhttp://localhost:3000/recuperar_contrase%C3%B1a.php\n\nSi no solicitaste esto, puedes ignorar este correo.\n\nGracias.";

    // El encabezado del correo electrónico
    $headers = "From: Mvallegu@ucvvirtual.edu.pe" . "\r\n" .
               "Reply-To: Mvallegu@ucvvirtual.edu.pe" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    
    mail($correo, $asunto, $mensaje, $headers);

    header("Location: confirmacion.php");
    exit;
}
?>
