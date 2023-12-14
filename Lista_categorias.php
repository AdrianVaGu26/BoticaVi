<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/open-iconic@1.1.1/font/css/open-iconic-bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f0f8ff; /* Azul claro */
        }

        .container {
            background-color: #fff; /* Fondo blanco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .category-card {
            cursor: pointer;
            background-color: #87ceeb; /* Azul claro más intenso */
            color: #fff; /* Texto blanco */
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .category-card:hover {
            background-color: #5f9ea0; /* Cambia el color al pasar el ratón */
        }

        .category-card .card-title {
            font-size: 1.2rem;
        }

        #medicamentos-container {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
    <title>Categorías de Medicamentos</title>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Categorías de Medicamentos</h2>

    <div class="row" id="categories-container">
        <!-- Las categorías se llenarán dinámicamente aquí -->
    </div>

    <div class="mt-4" id="medicamentos-container"></div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    var xhttp = new XMLHttpRequest();

    // Configurar manejo de errores
    xhttp.onerror = function () {
        console.error("Error en la solicitud AJAX");
    };

    // Realizar la solicitud AJAX
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Manipular la respuesta aquí
            var categoriasMedicamentos = JSON.parse(this.responseText);
            mostrarCategorias(categoriasMedicamentos);
        }
    };

    // Abrir y enviar la solicitud
    xhttp.open("GET", "mostrar_medicamentos.php", true);
    xhttp.send();

    function mostrarCategorias(categoriasMedicamentos) {
        var categoriesContainer = document.getElementById("categories-container");

        categoriasMedicamentos.forEach(function (categoriaMedicamento) {
            var categoryCard = document.createElement("div");
            categoryCard.classList.add("col-md-3", "mb-4");

            categoryCard.innerHTML = `
                <div class="card category-card" onclick="mostrarMedicamentos('${categoriaMedicamento.medicamentos}')">
                    <div class="card-body">
                        <h5 class="card-title">${categoriaMedicamento.categoria}</h5>
                        <i class="oi oi-pills"></i>
                    </div>
                </div>
            `;

            categoriesContainer.appendChild(categoryCard);
        });
    }

    function mostrarMedicamentos(medicamentos) {
        var medicamentosContainer = document.getElementById("medicamentos-container");
        var listaMedicamentos = medicamentos.split(',').map(m => m.trim());

        medicamentosContainer.innerHTML = `
            <h2>Medicamentos:</h2>
            <ul>
                ${listaMedicamentos.map(m => `<li>${m}</li>`).join('')}
            </ul>
        `;
    }
</script>

</body>
</html>
