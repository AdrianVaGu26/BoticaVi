<?php
include "modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM medicamentos WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="POST" class="row g-3">
            <h3 class="text-center text-secondary">Modificar Medicamentos</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            include "controlador/modificar_medicamentos.php";
            while ($datos = $sql->fetch_object()) { ?>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre del Medicamento</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripcion ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Precio Unitario</label>
                    <input type="text" class="form-control" name="precio" value="<?= $datos->precio ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descuento</label>
                    <input type="text" class="form-control" name="descuento" value="<?= $datos->descuento ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Activo</label>
                    <input type="text" class="form-control" name="activo" value="<?= $datos->activo ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha Vencimiento</label>
                    <input type="date" class="form-control" name="fecha_vencimiento"
                        value="<?= $datos->fecha_vencimiento ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock" value="<?= $datos->stock ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="categoria" value="<?= $datos->categoria ?>">
                </div>
            <?php
            }
            ?>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnmodificarMedicamentos" value="Ok">Modificar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
