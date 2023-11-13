<?php
include "modelo/conexion.php";

// Verificar si se envió el formulario de búsqueda
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Realizar la consulta con la condición de búsqueda
    $sql = $conexion->query("SELECT * FROM persona WHERE nombre LIKE '%$search%'");
    // Puedes ajustar la consulta según la estructura real de tu base de datos
} else {
    // Si no hay búsqueda, simplemente obtén todos los usuarios
    $sql = $conexion->query("SELECT * FROM persona");
}

// Resto del código para mostrar la tabla de usuarios...
?>
<?php
while ($datos = $sql->fetch_object()) {
    // Muestra cada fila de la tabla de usuarios
    // Puedes ajustar esto según la estructura real de tu base de datos
}
?>
