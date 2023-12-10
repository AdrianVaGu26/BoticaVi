<?php
if (!empty($_POST["btnregistrarmedicamentos"]) ) {
if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) &&
!empty($_POST["descuento"]) && !empty($_POST["activo"]) && !empty($_POST["fecha_vencimiento"])
&& !empty($_POST["stock"])&& !empty($_POST["categoria"])) {

// Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $descuento = $_POST["descuento"];
    $activo = $_POST["activo"];
    $fecha_vencimiento = $_POST["fecha_vencimiento"];
    $stock = $_POST["stock"];
    $categoria = $_POST["categoria"];;

        // Corregir la consulta SQL para evitar la repetición de $descuento
        $sql = $conexion->query("INSERT INTO medicamentos(nombre, descripcion, precio, descuento, activo, fecha_vencimiento, stock,categoria)
            VALUES ('$nombre', '$descripcion', '$precio', '$descuento', '$activo', '$fecha_vencimiento', '$stock','$categoria')");

        if ($sql == 1) {
            header("location: Menu.php?opcion=opcion0");
            echo '<div class="alert alert-success">Medicamento registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar medicamento</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos campos están vacíos</div>';
    }
}
?>
