<?php
if (!empty($_POST["btnregistrarmedicamentos"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $descuento = $_POST["descuento"];
    $activo = $_POST["activo"];
    $fecha_vencimiento = $_POST["fecha_vencimiento"];
    $stock = $_POST["stock"];
    $categoria = $_POST["categoria"];

    // Verificar si todos los campos obligatorios están presentes
    if (!empty($nombre) && !empty($descripcion) && !empty($precio)
        && isset($descuento) && isset($activo)
        && !empty($fecha_vencimiento) && isset($stock) && !empty($categoria)) {

        // Corregir la consulta SQL para evitar la repetición de $descuento
        $sql = $conexion->query("INSERT INTO medicamentos(nombre, descripcion, precio, descuento, activo, fecha_vencimiento, stock,categoria)
            VALUES ('$nombre', '$descripcion', '$precio', '$descuento', '$activo', '$fecha_vencimiento', '$stock','$categoria')");

        if ($sql == 1) {
            echo '<div class="alert alert-success">Medicamento registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar medicamento</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos</div>';
    }
}
?>
