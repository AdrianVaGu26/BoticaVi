<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="/Estilos/proveedor.css">
    
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
</head>

<body>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_proveedor.php";
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4 text-center">
                <h3 class="text-secondary">Proveedores registrados</h3>
                <?php
                // include "controlador/registro_persona.php";
                ?>
            </div>
            <div class="col-8 mx-auto">
                <div class="row">
                    <div class="col-12 p-4" id="tabla-personas">
                        <!-- Agregamos el botón "Nuevo" -->
                        <div class="text-end mb-2">
                            <a href="Nuevo_proveedor.php" class="btn btn-primary">Nuevo</a>
                        </div>

                        <table class="table table-hover mx-auto">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">APELLIDO</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">RUC</th>
                                    <th scope="col">DIRECCIÓN</th>
                                    <th scope="col">CORREO</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $sql = $conexion->query("select * from proveedores");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><?= $datos->id_proveedor ?></td>
                                        <td><?= $datos->nombre ?></td>
                                        <td><?= $datos->apellido ?></td>
                                        <td><?= $datos->dni ?></td>
                                        <td><?= $datos->ruc ?></td>
                                        <td><?= $datos->direccion ?></td>
                                        <td><?= $datos->correo?></td>
                                        <td>
                                            <div class="btn-container">
                                                <a href="modificar proveedor.php?id_proveedor=<?= $datos->id_proveedor ?>" class="btn btn-info">Editar</a>
                                                <a href="Lista_proveedor.php?id_proveedor=<?= $datos->id_proveedor ?>" class="btn btn-danger">Eliminar</a>
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
