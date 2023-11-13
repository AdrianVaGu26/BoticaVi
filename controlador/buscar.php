<?php
// Verificar si se envió el formulario de búsqueda
if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    // Realizar la consulta con la condición de búsqueda
    $sql = $conexion->query("SELECT * FROM persona WHERE nombre LIKE '%$nombre%'");
} else {
    // Si no hay búsqueda, simplemente obtén todos los usuarios
    $sql = $conexion->query("SELECT * FROM persona");
}
?>
