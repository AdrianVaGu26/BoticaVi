<?php
// prueba.php

// Recibir detalles de la transacción del cuerpo de la solicitud POST
$detalles_transaccion = json_decode(file_get_contents("php://input"), true);

// Verificar si los datos necesarios están presentes antes de intentar acceder a ellos
$id_transaccion = $detalles_transaccion['id'] ?? null;
$currency_code = $detalles_transaccion['purchase_units'][0]['amount']['currency_code'] ?? null;
$total_amount = $detalles_transaccion['purchase_units'][0]['amount']['value'] ?? null;
$buyer_name = $detalles_transaccion['payer']['name']['given_name'] ?? null;
$buyer_email = $detalles_transaccion['payer']['email_address'] ?? null;

// Mostrar detalles de la transacción de manera ordenada
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Venta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Detalles de la Venta</h2>

    <table class="table">
        <tbody>
            <tr>
                <th>ID de Transacción</th>
                <td><?php echo $id_transaccion; ?></td>
            </tr>
            <tr>
                <th>Moneda</th>
                <td><?php echo $currency_code; ?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td><?php echo $total_amount; ?></td>
            </tr>
            <tr>
                <th>Nombre del Comprador</th>
                <td><?php echo $buyer_name; ?></td>
            </tr>
            <tr>
                <th>Email del Comprador</th>
                <td><?php echo $buyer_email; ?></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
