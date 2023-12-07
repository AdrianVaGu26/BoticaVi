<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Botica</title>
    <link rel="stylesheet" href="/Estilos/estilosmenu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/Estilos/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:ital,wght@0,400;0,500;1,200&display=swap" rel="stylesheet">
</head>
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
    <form method="GET">
        <input type="text" placeholder="Buscar por nombre..." name="nombre">
        <button type="submit"><i class='bx bx-search'></i></button>
    </form>
</div>
</header>

<body>
<nav>
       <a href="?opcion=opcion0"><i class='bx bxs-capsule'></i>Medicamentos</a>
        <a href="?opcion=opcion1"><i class='bx bxs-bar-chart-alt-2'></i>Ventas</a>
        <a href="?opcion=opcion2"><i class='bx bxs-truck'></i>Proveedores</a>
        <a href="?opcion=opcion3"><i class='bx bxs-file'></i>Reportes</a>
        <a href="?opcion=opcion4"><i class='bx bxs-group'></i>Usuarios</a>
        <a href="?opcion=opcion5"><i class='bx bxs-category'></i>Categorías</a>
        <a href="cerrar_sesion.php"><i class='bx bxs-log-out'></i>Cerrar Sesión</a>
</nav>


<section>
    <?php
    $opcion = isset($_GET['opcion']) ? $_GET['opcion'] : '';

    // Mostrar contenido según la opción seleccionada
    switch ($opcion) {
        case 'opcion0':
            include 'Lista_Medicamentos.php';
            break;
        
        case 'opcion1':
            
            echo '<h2>Categorías de Medicamendsdfs</h2>';
            // Puedes agregar aquí el contenido específico para la Opción 2 (por ejemplo, lista de categorías)
            break;
            case 'opcion2':
                include 'Lista_proveedor.php';
                break;
                    case 'opcion3':
                        echo '<h2>Reportes Generales</h2>';
    echo '<div class="report-options">
            <div class="report-option">
                <h3>Ventas Mensuales</h3>
                <canvas id="ventasMensualesChart"></canvas>
            </div>
            <div class="report-option">
                <h3>Top 10 Medicamentos</h3>
                <canvas id="topMedicamentosChart"></canvas>
            </div>
            <!-- Agrega más opciones de reportes según tus necesidades -->
          </div>';

    // Datos para los gráficos (ejemplo, debes proporcionar tus propios datos)
    $ventasMensualesData = [100, 150, 200, 250, 300];
    $topMedicamentosData = [20, 15, 10, 5, 3, 2, 2, 1, 1, 1];
    
    // JavaScript para inicializar los gráficos con Chart.js
    echo '<script>
            // Ventas Mensuales Chart
            var ventasMensualesCtx = document.getElementById("ventasMensualesChart").getContext("2d");
            var ventasMensualesChart = new Chart(ventasMensualesCtx, {
                type: "bar",
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo"],
                    datasets: [{
                        label: "Ventas",
                        data: ' . json_encode($ventasMensualesData) . ',
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 1
                    }]
                }
            });

            // Top 10 Medicamentos Chart
            var topMedicamentosCtx = document.getElementById("topMedicamentosChart").getContext("2d");
            var topMedicamentosChart = new Chart(topMedicamentosCtx, {
                type: "pie",
                data: {
                    labels: ["Medicamento 1", "Medicamento 2", "Medicamento 3", "Medicamento 4", "Medicamento 5", "Medicamento 6", "Medicamento 7", "Medicamento 8", "Medicamento 9", "Medicamento 10"],
                    datasets: [{
                        data: ' . json_encode($topMedicamentosData) . ',
                        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#FFD700", "#32CD32", "#8A2BE2", "#808080"]
                    }]
                }
            });
          </script>';
                       
                        break;
                        case 'opcion4':
                           include 'Registros.php';
                            break;

        case 'opcion5':
            echo '<h2>Categorías de Medicamentos</h2>';
            echo '<div class="category-cards">
                    <div class="category-card">
                        <i class="bx bxs-pill"></i>
                        <h3>Medicamentos</h3>
                    </div>
                    <div class="category-card">
                        <i class="bx bxs-lotion"></i>
                        <h3>Cuidado de la Piel</h3>
                    </div>
                    <div class="category-card">
                        <i class="bx bxs-flask"></i>
                        <h3>Suplementos</h3>
                    </div>
                    <div class="category-card">
                        <i class="bx bxs-spa"></i>
                        <h3>Salud y Bienestar</h3>
                    </div>
                    <!-- Agrega más tarjetas según tus categorías -->
                  </div>';
                  break;
        default:
        include 'presentacion.php';
            break;
    }
    ?>
</section>

</body>
</html>
