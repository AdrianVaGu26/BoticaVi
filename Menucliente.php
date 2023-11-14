<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Farmacia</title>
    <link rel="stylesheet" href="/Estilos/estilosmenu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:ital,wght@0,400;0,500;1,200&display=swap" rel="stylesheet">
</head>
<header>
    <h3 class="icon-title"><i class='bx bx-plus-medical'></i>
    VIDAFarma BOTICA-PERFUMERÍA</h3>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." name="search">
        <button type="submit"><i class='bx bx-search'></i></button>
    </div>
</header>

<body>
<nav>
<a href="?opcion=opcion1"><i class='bx bxs-capsule'></i>Medicamentos</a>
        <a href="?opcion=opcion2"><i class='bx bxs-bar-chart-alt-2'></i>Carrito de compras</a>
        <a href="?opcion=opcion7"><i class='bx bxs-category'></i>Categorías</a>
        <a href="?opcion=opcion8"><i class='bx bxs-offer'></i>Ofertas</a>
        <a href="cerrar_sesioncliente.php"><i class='bx bxs-log-out'></i>Cerrar Sesión</a>
</nav>


<section>
    <?php
    $opcion = isset($_GET['opcion']) ? $_GET['opcion'] : '';

    // Mostrar contenido según la opción seleccionada
    switch ($opcion) {
        case 'opcion1':
            echo '<h2>Lista de Medicamentos</h2>';
            // Puedes agregar aquí el contenido específico para la Opción 1 (por ejemplo, lista de medicamentos)
            break;

        case 'opcion2':
            
            echo '<h2>Categorías de Medicamentos</h2>';
            // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
            break;
            case 'opcion3':
            
                echo '<h2>Categorías de Medicamentos</h2>';
                // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
                break;
                case 'opcion4':
            
                    echo '<h2>Categorías de Medicamentos</h2>';
                    // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
                    break;
                    case 'opcion5':
            
                        echo '<h2>Categorías de Medicamentos</h2>';
                        // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
                        break;
                        case 'opcion6':
                            include 'Registros.php';
                            echo '<h2>Categorías de Medicamentos</h2>';
                            // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
                            break;

        case 'opcion7':
            echo '<h2>Ofertas Especiales</h2>';
            // Puedes agregar aquí el contenido específico para la Opción 3 (por ejemplo, ofertas especiales)
            break;
            case 'opcion8':
            
                echo '<h2>Categorías de Medicamentos</h2>';
                // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
                break;

        default:#ffffff
        echo '<div class="bienvenida">
                <h2>Bienvenido a la Farmacia VIDAFarma</h2>
                <p>Servicio de calidad y productos confiables para tu salud.</p>
              </div>';
        
        // Agrega aquí la información adicional sobre la botica, números telefónicos, redes sociales, etc.
        echo '<div class="informacion">
                <p>Dirección: La nueva providencia-MzA-Lt19 </p>
                <p>WhatsApp: <a href="https://wa.me/985025973"><i class="bx bxl-whatsapp"></i> Envíanos un mensaje</a></p>
              </div>';
        break;
    
    }
    ?>
    <!-- Información de Métodos de Pago -->
    <div class="informacion-derecha">
        <div class="metodos-pago">
        <h3 class="titulo-metodos-pago">Medios de Pago</h3>
<ul>
    <li data-tooltip="Visa"><i class='bx bxl-visa'></i></li>
    <li data-tooltip="Mastercard"><i class='bx bxl-mastercard'></i></li>
    <li data-tooltip="Efectivo"><i class='bx bx-money'></i></li>
    <!-- Agrega más métodos de pago según sea necesario -->
</ul>
        </div>

        <!-- Información de Derechos de Autor -->
        <div class="derechos-autor">
            <p>BOTICAS IP S.A.C. - R.U.C. N° 20608430301
            Copyright © Mifarma 2020 Todos los derechos reservados.</p>
        </div>
    </div>
</section>
</body>
</html>
