<?php
require 'config/config.php';
require 'config/databaseproductos.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM medicamentos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


session_destroy();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/Estilos/estilomedicamentos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

 <!-- Menu de navegación -->
 <header>
 <nav class="navbar bg-dark fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand text-light" href="#"> Offcanvas navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
       <div class="offcanvas-header bg-primary">
  <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">Offcanvas</h5>
  <button type="button" class="btn-close text-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
       </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>

</header>
    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php 

                            $id = $row['id'];
                            $imagen = "images/productos/" . $id . "/digestal.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "images/productos/2/hepabiontaforte.jpg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                <p class="card-text">S/ <?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="details.php?id=<?php echo $row['id'];  ?>&token=<?php echo 
                                        hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <div class="btn-group">
                                    </div>
                                    <a href="Medicamentos.php"class="btn btn-outline-success">Actualizar Medicamentos</a>
                                   
                                    </div>
                        </div>
                       </div>
                    </div>
                <?php } ?>
            </div>
        </div>
                                   




<footer class="footer mt-auto py-2 bg-dark">
    <div class="container">
        <p class="text-center">
            <span class="text-white">&copy; 2023 <a href="Menucliente.php">Botica Vida Farma</a></span>
        </p>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function addProducto(id, token) {
            var url = 'clases/carrito.php';
            var formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero;
                    }
                })
        }
    </script>

    
</body>
</html>




