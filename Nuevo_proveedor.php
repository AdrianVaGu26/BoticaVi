<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
         html, body {
        height: 100%;
        margin: 0;
    }
        body {
            padding: 100px;
            padding-top: 30px;
            background-image: url(''); /* Ruta de la imagen de fondo */
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        
        }
    </style>
</head>
<body>
<center>
<h2>REGISTRAR</h2>
</center>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_persona.php";
    ?>
    <div class="register-form">
            <?php
             include "controlador/registro_proveedor.php";
            ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre del Proveedor</label>
                    <input type="text" class="form-control"  name="nombre">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido del Proveedor</label>
                    <input type="text" class="form-control"  name="apellido">
                </div>
                <div class="mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="text" class="form-control" name="dni" pattern="[0-9]{8}" title="Ingrese un DNI válido de 8 dígitos" maxlength="8" required>
</div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ruc </label>
                    <input type="text" class="form-control"  name="ruc">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dirección </label>
                    <input type="text" class="form-control"  name="direccion">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo">
                </div>
   
                <center>
                <button type="submit" class="btn btn-primary" name="btnregistrarproveedor" value="Ok">Registrar</button>
                </center>
                
            </form>
    </div>
</body>

</html>
