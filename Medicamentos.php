<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario con Imagen</title>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, button {
      margin-bottom: 16px;
    }

    input[type="file"] {
      display: none;
    }

    .custom-file-upload {
      background-color: #4caf50;
      color: #fff;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <form>
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

    <label for="productImage">Imagen del Medicamento:</label>
    <input type="file" id="productImage" name="productImage" accept="image/*" required>
    <label for="productImage" class="custom-file-upload">Seleccionar Imagen</label>

    <button type="submit">Enviar</button>
  </form>

  <script>
    // Simulación de la carga de la imagen
    const fileInput = document.getElementById('productImage');
    const customFileUpload = document.querySelector('.custom-file-upload');

    customFileUpload.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', () => {
      customFileUpload.textContent = `Imagen seleccionada: ${fileInput.files[0].name}`;
    });
  </script>

</body>
</html>
