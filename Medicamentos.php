<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>

<body>
    <?php
        include "modelo/conexion.php";
        include "controlador/eliminar_persona.php";
    ?>
    <div class="container">
        <form method="POST" class="row g-3">
            <h3 class="text-center text-secondary">Registro de personas</h3>
            <?php
                include "controlador/registro_medicamentos.php";
            ?>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Medicamento</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio Unitario</label>
                <input type="text" class="form-control" id="precio" name="precio">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Descuento</label>
                <input type="text" class="form-control" id="descuento" name="descuento">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Activo</label>
                <input type="text" class="form-control" id="activo" name="activo">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Vencimiento</label>
                <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>

            <div class="col-12">
                <label for="productImage" class="form-label">Imagen del Medicamento:</label>
                <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="btnregistrarmedicamentos" value="Ok">Registrar</button>
            </div>
        </form>
    </div>

    <script>
        // Simulación de la carga de la imagen
        const fileInput = document.getElementById('productImage');
        fileInput.addEventListener('change', () => {
            console.log(`Imagen seleccionada: ${fileInput.files[0].name}`);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
