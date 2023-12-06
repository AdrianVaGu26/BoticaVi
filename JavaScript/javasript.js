document.addEventListener("DOMContentLoaded", function () {
    // Obtener los enlaces de categoría por sus IDs
    const saludSexualEnlace = document.getElementById('saludSexual');
    const resfriadoEnlace = document.getElementById('resfriado');

    // Agregar event listener a cada enlace de categoría
    saludSexualEnlace.addEventListener('click', function (event) {
        event.preventDefault();
        consultarMedicamentosPorCategoria('Salud Sexual');
    });

    resfriadoEnlace.addEventListener('click', function (event) {
        event.preventDefault();
        consultarMedicamentosPorCategoria('Para el Resfriado');
    });
});

function consultarMedicamentosPorCategoria(categoria) {
    // Hacer una solicitud AJAX al servidor para obtener medicamentos por categoría
    // Aquí puedes usar fetch o cualquier otra biblioteca de AJAX
    fetch(`tiendaonline copy.php?categoria=${categoria}`)
        .then(response => response.json())
        .then(data => {
            // Manipular los datos devueltos, por ejemplo, mostrarlos en la página
            console.log(data);
        })
        .catch(error => console.error('Error:', error));
}
