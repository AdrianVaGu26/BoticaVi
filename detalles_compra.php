<?php
// detalles_compra.php

// Recibir detalles de la transacción del cuerpo de la solicitud POST
$detalles_transaccion = json_decode(file_get_contents("php://input"), true);

// Extraer información específica
$id_transaccion = $detalles_transaccion['id'];
$medicamentos = $detalles_transaccion['purchase_units'][0]['items']; // Asumiendo que los medicamentos están en la primera unidad de compra
$precio = $detalles_transaccion['purchase_units'][0]['amount']['value'];
$status = 'Completado'; // Puedes ajustar esto según tu lógica
$email = 'correo@ejemplo.com'; // Ajusta esto según tus datos
$id_cliente = 1; // Ajusta esto según tus datos

// Guardar detalles en la base de datos
$conexion = new mysqli("localhost", "root", "", "crodd");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$sql = "INSERT INTO compra (id_transaccion, status, email, id_cliente) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssi", $id_transaccion, $status, $email, $id_cliente);

if ($stmt->execute()) {
    echo "Detalles de la compra guardados en la base de datos con éxito.";
} else {
    echo "Error al guardar detalles de la compra: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
