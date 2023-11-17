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
            background-image: url('https://crehana-blog.s3.amazonaws.com/media/filer_public/82/a7/82a757bb-081c-4fec-bf4e-ba46ba9925ba/fondos-pantalla-pc-3d-2.png'); /* Ruta de la imagen de fondo */
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

        include "controlador/registro_persona.php";
        ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
                <input type="text" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="Ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA DE NACIMIENTO</th>
                        <th scope="col">CORREO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql= $conexion->query("select * from persona");
                    while($datos = $sql->fetch_object()){?>
                     <tr>
                     <td><?=$datos->id_persona?></td>
                     <td><?=$datos->nombre?></td>
                     <td><?=$datos->apellido?></td>
                     <td><?=$datos->dni?></td>
                     <td><?=$datos->fecha_nac?></td>
                     <td><?=$datos->correo?></td>
                     <td>
                            <a href="modificar.php?id=<?=$datos->id_persona?>"class="btn btn-info">Editar</a>
                            <a href="index.php?id=<?=$datos->id_persona?>"class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
