<?php
require 'config/config.php';
require 'config/databaseproductos.php';
$db = new Database();
$con = $db->conectar();

$medicamentos = isset($_SESSION['carrito']['medicamentos'])? $_SESSION['carrito']['medicamentos'] :null;
print_r($_SESSION);

$lista_carrito = array();

if($medicamentos !=null){
    foreach($medicamentos as $clave => $cantidad){


$sql = $con->prepare("SELECT id, nombre, precio,descuento, $cantidad AS cantidad FROM medicamentos WHERE id=? AND activo=1");
$sql->execute([$clave]);
$lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
}
}
//session_destroy();

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
</head>
<body>

 <!-- Menu de navegación -->
 <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="tiendaonline.php" class="navbar-brand"> 
                <strong>Medicamentos</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarTop" aria-controls="navBarTop" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="tiendaonline.php" class="nav-link active">Medicamentos y Perfumes </a>
                    </li>

                    
                </ul>
                <a href="ver_carrito.php" class="btn btn-primary btn-sm me-2">
                    <i class="fas fa-shopping-cart"></i> Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                </a>

                
            </div>
        </div>
    </nav>
</header>
    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container"> 
            <div class="table-responsive">
                <table class="table">
             <thead>
                <tr>
                    <th>Medicamento</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
             </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr><td colspan="5" class="text-center"><b>Lista Vacia</b></td></tr>';
                    }else{
                        $total = 0;
                        foreach($lista_carrito as $medicamentos){
                            $id=$medicamentos['id'];
                            $nombre=$medicamentos['nombre'];
                            $precio=$medicamentos['precio'];
                            $descuento=$medicamentos['descuento'];
                            $cantidad=$medicamentos['cantidad'];
                            $precio_desc=$precio -(($precio * $descuento)/100);
                            $subtotal = $cantidad * $precio_desc;
                            $total += $subtotal;
                         ?>                
                    <tr>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo MONEDA.number_format($precio_desc,2,'.','.');?></td>
                        <td>
                            <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>"
                            size ="5" id = "cantidad_<?php echo $id;?>"onchange="">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $id;?>" name="subtotal[]"><?php echo MONEDA.
                            number_format($subtotal,2,'.','.');?></div>
                        </td>
                         <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo 
                         $id; ?>"data-ds-toogle="modal" data-bs-target="eliminar">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                   <tr>
                    <td colspan="3"></td>
                    <td colspan="2">
                        <p class="h3" id ="total"><?php echo MONEDA.number_format($total,2,'.','.');
                        ?></p>
                    </td>
                </tr>


         </tbody>
         <?php } ?>
        </table>
        </div>
        <div class ="row">
            <div class ="col-md-5 offset-md-7 d-grid gap-2">
              <button class="btn btn-primary btn-lg">Realizar pago</button>
            </div>

        </div>
        </div>
    </main>                          





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




