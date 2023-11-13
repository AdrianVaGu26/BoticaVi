<?php
if (!empty($_POST["btniniciar"])) {
    if (!empty($_POST["correo"]) && !empty($_POST["contraseña"])) {
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];

        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "crodd");

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar el inicio de sesión
        $sql = "SELECT * FROM persona WHERE correo = '$correo' AND contraseña = '$contraseña'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            // Inicio de sesión exitoso, redirige al menú principal
            header("Location: Menu.php");
            exit(); // Asegura que no se procese más código después de la redirección
        } else {
            echo '<div class="alert alert-danger">Correo o contraseña incorrectos. Por favor, inténtalo de nuevo.</div>';
        }

        $conexion->close();
    } else {
        echo '<div class="alert alert-warning">ALGUNOS CAMPOS ESTÁN VACÍOS</div>';
    }
}
?>
