<?php

include 'modelo/conexion.php';

function insertarMedicamento($nombre, $descripcion, $precio, $id_categoria, $activo, $fecha_vencimiento, $stock) {
    global $conexion;

    $sql = "INSERT INTO medicamentos (nombre, descripcion, precio, id_categoria, activo, fecha_vencimiento, stock)
            VALUES ('$nombre', '$descripcion', $precio, $id_categoria, $activo, '$fecha_vencimiento', $stock)";

    if ($conexion->query($sql) === TRUE) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conexion->error;
    }
}

function editarMedicamento($id, $nombre, $descripcion, $precio, $id_categoria, $activo, $fecha_vencimiento, $stock) {
    global $conexion;

    $sql = "UPDATE medicamentos
            SET nombre='$nombre', descripcion='$descripcion', precio=$precio, id_categoria=$id_categoria,
                activo=$activo, fecha_vencimiento='$fecha_vencimiento', stock=$stock
            WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        return true;
    } else {
        return "Error updating record: " . $conexion->error;
    }
}

function eliminarMedicamento($id) {
    global $conexion;

    $sql = "DELETE FROM medicamentos WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        return true;
    } else {
        return "Error deleting record: " . $conexion->error;
    }
}

?>
