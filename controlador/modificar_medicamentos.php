<?php
if (!empty($_POST["btnmodificarMedicamentos"])) {
    // Obtener el ID del formulario
    $id = $_POST["id"];

    if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) &&
        !empty($_POST["descuento"]) && !empty($_POST["activo"]) && !empty($_POST["fecha_vencimiento"])
        && !empty($_POST["stock"]) && !empty($_POST["categoria"])) {

        // Obtén los datos del formulario
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $descuento = $_POST["descuento"];
        $activo = $_POST["activo"];
        $fecha_vencimiento = $_POST["fecha_vencimiento"];
        $stock = $_POST["stock"];
        $categoria = $_POST["categoria"];

        $sql = $conexion->query("UPDATE medicamentos SET nombre='$nombre', descripcion='$descripcion', precio='$precio',
                                 descuento='$descuento', activo='$activo', fecha_vencimiento='$fecha_vencimiento', 
                                 stock='$stock', categoria='$categoria' WHERE id=$id");

        if ($sql == 1) {
            header("location: Menu.php?opcion=opcion0");
        } else {
            echo '<div class="alert alert-danger"> Error al modificar el Medicamento</div>';
        }
    } else {
        echo '<div class="alert alert-warning">ALGUNOS CAMPOS ESTÁN VACÍOS MI LOCO</div>';
    }
}
?>
