<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) &&
        !empty($_POST["fecha"]) && !empty($_POST["correo"]) && !empty($_POST["contraseña"])) {

        // Obtén los datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];

        // Validar la longitud del DNI
        if (strlen($dni) === 8) {
            // Inserta los datos en la base de datos
            $sql = $conexion->query("INSERT INTO persona (nombre, apellido, dni, fecha_nac, correo, contraseña)
                                    VALUES ('$nombre', '$apellido', '$dni', '$fecha', '$correo', '$contraseña')");

            if ($sql) {
                // Envía un correo de confirmación al usuario
                $asunto = "Confirmación de Registro";
                $mensaje = "¡Hola $nombre $apellido! Gracias por registrarte en nuestro sitio.";

                // Ajusta la cabecera del correo
                $cabecera = "From: root.del.1@example.com\r\n";
                $cabecera .= "Reply-To: guzman.valle.adrian.16@gmail.com\r\n";
                $cabecera .= "X-Mailer: PHP/" . phpversion();

                // Envía el correo
                @mail($correo, $asunto, $mensaje, $cabecera);

                echo '<div class="alert alert-success" id="registroExitoso">Registro Exitoso.</div>';
                echo '<script>
                        setTimeout(function () {
                            document.getElementById("registroExitoso").style.display = "none";
                            window.location.href = "Login.php";
                        }, 4000);
                      </script>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar persona.</div>';
            }
        } else {
            // Muestra una alerta si la longitud del DNI no es 8
            echo '<div class="alert alert-warning">El número de DNI debe tener exactamente 8 caracteres.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos.</div>';
    }
}
?>
