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

    <div class="search-container">
        <input type="text" placeholder="Buscar..." name="search">
        <button type="submit"><i class='bx bx-search'></i></button>
    </div>
</header>

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
            // Puedes agregar aquí el contenido específico para la Opción 3
            break;

        // Agrega más casos según sea necesario

        default:
            echo '<div class="bienvenida">
                    <h2>Bienvenido VidaFarma</h2>
                    <p>Servicio de calidad y productos confiables para tu salud.</p>
    </div>';
            echo '<div class="contenedor">
                    <div class="sobre">
                        <h3 class="titulo-secciones">Sobre Nosotros</h3>
                        <div class="nosotros">
                            <a href="vidafarma.html" class="nosotross43">VidaFarma</a>
                        </div>
                    </div>';

            echo '<div class="encuentranos">
                        <h3 class="titulo-encuentranos">Encuéntranos</h3>
                        <div class="direcciones">
                            <p class="direcc">Dirección: La nueva providencia-MzA-Lt19</p>
                        </div>
                    </div>';

            echo '<div class="seccion">
                        <h3 class="titulo-seccion">Contáctanos</h3>
                        <div class="contacto">
                        <p class="whatsapp"><i class="bx bxs-phone"></i></a>Telefono: 073-321250</p>
                            <p class="whatsapp">WhatsApp: <a href="https://wa.me/985025973"><i class="bx bxl-whatsapp"></i> Envíanos un mensaje</a></p>
                        </div>
                    </div>';

            // Información de Métodos de Pago
            echo '<div class="informacion-derecha">
                        <div class="metodos-pago">
                            <h3 class="titulo-metodos-pago">Medios de Pago</h3>
                            <ul>
                                <li data-tooltip="Visa"><i class="bx bxl-visa"></i></li>
                                <li data-tooltip="Mastercard"><i class="bx bxl-mastercard"></i></li>
                                <li data-tooltip="Efectivo"><i class="bx bx-money"></i></li>
                                <!-- Agrega más métodos de pago según sea necesario -->
                            </ul>
                        </div>';

            break;
    }
    ?>
</section>
<!-- Bloque de derechos de autor -->
<div class="derechos-autor">
    <p>BOTICAS IP S.A.C. - R.U.C. N° 10423237401
    Copyright © VidaFarma 2020 Todos los derechos reservados.</p>
</div>
</body>
</html>
