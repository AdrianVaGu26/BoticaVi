<?php
if (!empty($_POST["btnregistrarproveedor"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) &&
        !empty($_POST["ruc"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"])) {

        // Obtén los datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $ruc = $_POST["ruc"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];

        // Validar la longitud del DNI
        if (strlen($dni) === 8) {
            // Inserta los datos en la base de datos
            $sql = $conexion->query("INSERT INTO proveedores (nombre, apellido, dni, ruc, direccion, correo)
                                    VALUES ('$nombre', '$apellido', '$dni', '$ruc', '$direccion', '$correo')");

            if ($sql) {
                echo '<div class="alert alert-success" id="registroExitoso">Registro Exitoso.</div>';

                // Redirigir al usuario al Menú en la opción 2
                header("Location: Menu.php?opcion=opcion2");
                exit(); // Asegurar que el script se detenga después de la redirección
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
