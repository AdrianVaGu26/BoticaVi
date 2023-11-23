<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <!-- Agrega tus enlaces a CSS y otras dependencias aquí si es necesario -->
    <link rel="stylesheet" href="/Estilos/estilocon.css">
    <!-- Otros enlaces de CSS y dependencias si es necesario -->
</head>

<body>
    <div class="recovery-form-container">
        <div class="recovery-form">
            <?php
            // Agrega la lógica de recuperación de contraseña aquí si es necesario
            ?>
            <center>
                <h2>Recuperar Contraseña</h2>
            </center>
            <p>Ingresa tu correo electrónico para recuperar tu contraseña.</p>
            <form method="POST">
                <div class="mb-3">
                    <label>
                        <i class='bx bxl-gmail'></i>
                        <input type="text" placeholder="Correo electrónico" name="correo">
                    </label>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary" name="btnrecuperar" value="Ok">Recuperar Contraseña</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
