<?php
include "modelo/conexion.php";
$id_proveedor=$_GET["id_proveedor"];
$sql = $conexion->query("SELECT * FROM proveedores WHERE id_proveedor=$id_proveedor");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid row">
        <form class="col-4" method="POST">
        <h3 class="text-center text-secundary">Modificar Proveedor</h3>
        <input type="hidden" name="id_proveedor" value="<?=$_GET["id_proveedor"]?>">
        <?php
        include "controlador/modificar_proveedor.php"; 
        while($datos=$sql->fetch_object()) { ?>
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Proveedor</label>
                <input type="text" class="form-control" name="nombre" value="<?=$datos->nombre?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido del Proveedor</label>
                <input type="text" class="form-control" name="apellido"value="<?=$datos->apellido?>"> 
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni"value="<?=$datos->dni?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">RUC</label>
                <input type="text" class="form-control" name="ruc"value="<?=$datos->ruc?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI</label>
                <input type="text" class="form-control" name="direccion"value="<?=$datos->direccion?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo"value="<?=$datos->correo?>">
            </div>
            </div>
            <?php
        }
        ?>
    <button type="submit" class="btn btn-primary" name="btnmodificarproveedor" value="Ok">Modificar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>