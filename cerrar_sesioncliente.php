<?php
// Iniciar o reanudar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Cierre de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 100px;
        }

        .confirm-box {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-aceptar,
        .btn-cancelar {
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn-aceptar {
            background-color: blue;
            color: white;
        }

        .btn-cancelar {
            background-color: #f44336;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="confirm-box">
        <h2>¿Estás seguro de que deseas cerrar la sesión?</h2>
        <button class="btn-aceptar" onclick="confirmarCierreSesion(true)">Aceptar</button>
        <button class="btn-cancelar" onclick="confirmarCierreSesion(false)">Cancelar</button>
    </div>

    <script>
        function confirmarCierreSesion(aceptar) {
            if (aceptar) {
                <?php
                // Destruir todas las variables de sesión
                session_unset();

                // Destruir la sesión
                session_destroy();
                ?>

                // Redirigir a la página de inicio de sesión
                window.location.href = "Login.php";
            } else {
                // Si el usuario hace clic en "Cancelar", redirigir a la página de menú
                window.location.href = "menucliente.php";
            }
        }
    </script>
</body>

</html>
