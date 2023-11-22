<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Tu archivo de estilos CSS -->
    <link rel="stylesheet" href="/Estilos/estilocarrito.css">
</head>
<body>
    <div class="container">
        <?php
        // Verifica si el carrito no está vacío
        if (isset($_SESSION['carrito']['medicamentos']) && count($_SESSION['carrito']['medicamentos']) > 0) {
            // Conexión a la base de datos (ajusta según tus credenciales)
            $dbHost = 'localhost';
            $dbUser = 'root';
            $dbPass = '';
            $dbName = 'crodd';

            $con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

            if ($con->connect_error) {
                die("Error de conexión: " . $con->connect_error);
            }

            // Obtén los productos del carrito
            $productosCarrito = $_SESSION['carrito']['medicamentos'];

            // Variables para el total y descuento
            $totalPagar = 0;
            $descuentoTotal = 0;

            // Muestra los productos en el carrito
            foreach ($productosCarrito as $id => $cantidad) {
                // Obtiene la información completa del producto desde la base de datos
                $sql = "SELECT nombre, precio, descuento FROM medicamentos WHERE id = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($nombre, $precio, $descuento);
                $stmt->fetch();
                $stmt->close();

                // Calcula el total a pagar y descuento para cada producto
                $totalProducto = $precio * $cantidad;
                $descuentoProducto = ($descuento / 100) * $totalProducto;

                // Muestra la información del producto
                echo '<div>';
                echo '<p><i class="fas fa-medkit"></i> Nombre: ' . $nombre . '</p>';
                echo '<p><i class="fas fa-dollar-sign"></i> Precio: S/ ' . number_format($precio, 2, '.', ',') . '</p>';
                echo '<p><i class="fas fa-percent"></i> Descuento: ' . $descuento . '%</p>';
                echo '<p><i class="fas fa-money-bill-wave"></i> Total a Pagar: S/ ' . number_format($totalProducto - $descuentoProducto, 2, '.', ',') . '</p>';
                echo '<p><i class="fas fa-sort-numeric-up"></i> Cantidad: ' . $cantidad . '</p>';
                echo '<hr>';
                echo '</div>';

                // Actualiza el total a pagar y el descuento total
                $totalPagar += $totalProducto - $descuentoProducto;
                $descuentoTotal += $descuentoProducto;
            }

            // Muestra el total general y el descuento total
            echo '<p><strong>Total a Pagar (sin descuento): S/ ' . number_format($totalPagar, 2, '.', ',') . '</strong></p>';
            echo '<p><strong>Descuento Total: S/ ' . number_format($descuentoTotal, 2, '.', ',') . '</strong></p>';

            // Botón de confirmar compra
            echo '<button type="button" onclick="confirmarCompra()" class="btn btn-success"><i class="fas fa-check"></i> Confirmar Compra</button>';

            $con->close();
        } else {
            // Si el carrito está vacío
            echo '<p>El carrito está vacío.</p>';
        }
        ?>
    </div>

    <script>
        function confirmarCompra() {
            // Aquí puedes agregar la lógica para confirmar la compra, como redirigir a una página de pago, etc.
            alert('Compra confirmada. Redirigiendo...');
            // window.location.href = 'pagina_de_pago.php'; // Descomenta esta línea para redirigir
        }
    </script>

    <!-- Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha384-7B5k5Y3eYvEdw9fTxCYAT5KTZuZjPeV+ZksM18jk25Z5LjPByBs/DaIhJzrI1Qzj" crossorigin="anonymous"></script>
</body>
</html>
