<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/Estilos/estiloregis.css">
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
             include "controlador/registro_persona.php";
            ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                    <input type="text" class="form-control"  name="nombre">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                    <input type="text" class="form-control"  name="apellido">
                </div>
                <div class="mb-3">
    <label for="dni" class="form-label">DNI de la persona</label>
    <input type="text" class="form-control" name="dni" pattern="[0-9]{8}" title="Ingrese un DNI válido de 8 dígitos" maxlength="8" required>
</div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control"  name="fecha">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo">
                </div>
                <div class="mb-3">
    <label for="contraseña" class="form-label">Contraseña</label>
    <div class="input-group">
        <input type="password" class="form-control" name="contraseña" id="passwordInput" required>
        <button class="btn btn-outline-secondary" type="button" id="togglePassword">Mostrar</button>
    </div>
</div>

<script>
document.getElementById("togglePassword").addEventListener("click", function () {
    var passwordInput = document.getElementById("passwordInput");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
</script>

                <center>
                <button type="submit" class="btn btn-primary" name="btnregistrar" value="Ok">Registrar</button>
                </center>
                
            </form>
    </div>
</body>
</html>
