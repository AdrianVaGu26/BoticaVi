<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
       <?php
       include "modelo/conexion.php";
       include "controlador/eliminar_persona.php";
       ?>
    <div class="container-fluid row">

         <form class="col-4" method="POST">
        <h3 class="text-center text-secundary">Registro de personas</h3>
        <?php

        include "controlador/registro_medicamentos.php";
        ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Medicamento</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio Unitario</label>
                <input type="text" class="form-control" name="precio">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descuento</label>
                <input type="text" class="form-control" name="descuento">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Activo</label>
                <input type="text" class="form-control" name="activo">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Vencimiento</label>
                <input type="date" class="form-control" name="fecha_vencimiento">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrarmedicamentos" value="Ok">Registrar</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
