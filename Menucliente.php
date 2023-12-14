<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Farmacia</title>
    <link rel="stylesheet" href="/Estilos/estilosmenu.css">
    <link rel="stylesheet" href="/Estilos/estilonosotros.css">
    <link rel="stylesheet" href="/Estilos/estiloencu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:ital,wght@0,400;0,500;1,200&display=swap" rel="stylesheet">
    <script src="/JavaScript/Cursor.js"></script>
</head>
<body>
<header>
    <h3 class="icon-title" id="regresarDefault">
        <i class='bx bx-plus-medical'></i> VIDAFarma BOTICA-PERFUMERÍA
    </h3>

    <script>
        document.getElementById('regresarDefault').addEventListener('click', function() {
            window.location.href = '?opcion=default';
        });
    </script>

 
</header>

<nav>
    <a href="tiendaonline.php"><i class='bx bxs-capsule'></i>Medicamentos</a>
    <a href="Lista_categorias.php"><i class='bx bxs-category'></i>Categorías</a>
    <a href="cerrar_sesioncliente.php"><i class='bx bxs-log-out'></i>Cerrar Sesión</a>
</nav>

<section>
    <?php
    $opcion = isset($_GET['opcion']) ? $_GET['opcion'] : '';

    // Mostrar contenido según la opción seleccionada
    switch ($opcion) {
        
        case 'opcion3':
            echo '<h2>Categorías de Medicamentos</h2>';
            // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
            break;

            case 'opcion2':
              
                break;
            

        // Agrega más casos según sea necesario

        default:
    include 'presentacion.php';
    break;

    }
    ?>
</section>
</body>
</html>
