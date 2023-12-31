<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Estilos/estilo.css">
    
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
</head>

<body>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_persona.php";
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4 text-center">
                <h3 class="text-secondary">Usuarios registrados</h3>
                <?php
             include "controlador/registro_persona.php";
             ?>
            </div>
            <div class="col-8 mx-auto">
                <div class="row">
                    <div class="col-12 p-4" id="tabla-personas">
                        <table class="table table-hover mx-auto">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">APELLIDO</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">FECHA DE NACIMIENTO</th>
                                    <th scope="col">CORREO</th>
                                    <th scope="col">CONTRASEÑA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $sql = $conexion->query("select * from persona");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><?= $datos->id_persona ?></td>
                                        <td><?= $datos->nombre ?></td>
                                        <td><?= $datos->apellido ?></td>
                                        <td><?= $datos->dni ?></td>
                                        <td><?= $datos->fecha_nac ?></td>
                                        <td><?= $datos->correo ?></td>
                                        <td><?= $datos->contraseña?></td>
                                        <td>
                                        <div class="btn-container">
    <a href="modificar.php?id=<?= $datos->id_persona ?>" class="btn btn-info">Editar</a>
    <a href="Registros.php?id=<?= $datos->id_persona ?>" class="btn btn-danger">Eliminar</a>
                                       </div>
  
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
