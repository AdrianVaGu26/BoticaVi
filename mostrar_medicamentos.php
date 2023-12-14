<?php
// Conectarse a la base de datos (ajusta los detalles de conexión)
$conexion = new mysqli("localhost", "root", "", "crodd");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta para obtener categorías y medicamentos
$query = "SELECT categoria, GROUP_CONCAT(nombre SEPARATOR ', ') AS medicamentos FROM medicamentos GROUP BY categoria";
$result = $conexion->query($query);

// Crear un array para almacenar los resultados
$categorias_medicamentos = array();

// Procesar los resultados
while ($row = $result->fetch_assoc()) {
    $categorias_medicamentos[] = array(
        'categoria' => $row['categoria'],
        'medicamentos' => $row['medicamentos']
    );
}

// Cerrar la conexión
$conexion->close();

// Devolver la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($categorias_medicamentos);
?>
