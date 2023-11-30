<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Agrega tus estilos personalizados si es necesario -->
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">

<?php
session_start();

if (isset($_SESSION['carrito']['medicamentos']) && count($_SESSION['carrito']['medicamentos']) > 0) {
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'crodd';

    $con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($con->connect_error) {
        die("Error de conexión: " . $con->connect_error);
    }

    $productosCarrito = $_SESSION['carrito']['medicamentos'];
    $totalPagar = 0;
    $descuentoTotal = 0;

    foreach ($productosCarrito as $id => $cantidad) {
        $sql = "SELECT nombre, precio, descuento FROM medicamentos WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($nombre, $precio, $descuento);
        $stmt->fetch();
        $stmt->close();

        $totalProducto = $precio * $cantidad;
        $descuentoProducto = ($descuento / 100) * $totalProducto;

        echo '<div class="card mb-3" style="width: 18rem;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $nombre . '</h5>';
        echo '<p class="card-text">Precio: S/ ' . number_format($precio, 2, '.', ',') . '</p>';
        echo '<p class="card-text">Descuento: ' . $descuento . '%</p>';
        echo '<p class="card-text">Total a Pagar: S/ ' . number_format($totalProducto - $descuentoProducto, 2, '.', ',') . '</p>';
        echo '<p class="card-text">Cantidad: ' . $cantidad . '</p>';
        echo '</div>';
        echo '</div>';

        $totalPagar += $totalProducto - $descuentoProducto;
        $descuentoTotal += $descuentoProducto;
    }

    echo '<div class="total-info mt-4">';
    echo '<p class="total-label">Total a Pagar (con descuento):</p>';
    echo '<p class="total-amount">S/ ' . number_format($totalPagar, 2, '.', ',') . '</p>';
    echo '<p class="total-label">Descuento Total:</p>';
    echo '<p class="total-amount">S/ ' . number_format($descuentoTotal, 2, '.', ',') . '</p>';
    echo '<hr>';
    echo '</div>';

    echo '<form method="post" action="procesar_compra.php" class="payment-form mt-4">';
    echo '<div class="mb-3">';
    echo '<label for="metodoPago" class="form-label">Seleccione método de pago:</label>';
    echo '<select id="metodoPago" name="metodoPago" class="form-select">';
    echo '<option value="efectivo">Efectivo</option>';
    echo '<option value="tarjeta_credito">Tarjeta de Crédito</option>';
    echo '<option value="tarjeta_debito">Tarjeta de Débito</option>';
    echo '</select>';
    echo '</div>';
    echo '<button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Confirmar Compra</button>';
    echo '</form>';

    $con->close();
} else {
    echo '<p class="alert alert-warning">El carrito está vacío.</p>';
}
?>

</body>
</html>
