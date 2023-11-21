<?php
// mostrar_medicamentos.php

// Configurar el manejo de errores y el tipo de contenido
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Incluir la conexión a la base de datos
include_once "../modelo/conexion.php";

// Inicializar un array para almacenar los resultados
$resultados = array();

// Realizar la consulta para obtener los medicamentos
$sql = "SELECT * FROM productos WHERE categoria = 'Medicamento'";
$result = $conexion->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y agregarlos al array
    while ($row = $result->fetch_assoc()) {
        $resultados[] = array(
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'stock' => $row['stock']
        );
    }
}

// Cerrar la conexión
$conexion->close();

// Enviar los resultados como JSON
echo json_encode($resultados);
?>
