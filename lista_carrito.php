<?php
require 'config/config.php';
require 'config/databaseproductos.php';
$db = new Database();
$con = $db->conectar();

$medicamentos = isset($_SESSION['carrito']['medicamentos'])? $_SESSION['carrito']['medicamentos'] :null;


$lista_carrito = array();

if($medicamentos !=null){
    foreach($medicamentos as $clave => $cantidad){


$sql = $con->prepare("SELECT id, nombre, precio,descuento, $cantidad AS cantidad FROM medicamentos WHERE id=? AND activo=1");
$sql->execute([$clave]);
$lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
}
}


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
                            size ="5" id = "cantidad_<?php echo $id;?>"onchange="actualizacantidad(this.value,<?php echo $id; ?>)">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $id;?>" name="subtotal[]"><?php echo MONEDA.
                            number_format($subtotal,2,'.','.');?></div>
                        </td>
                         <td><a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $id; ?>" 
                         data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</a></td>
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
        <?php if($lista_carrito != null){?>
        <div class ="row">
            <div class ="col-md-5 offset-md-7 d-grid gap-2">
              <a href="Pago.php" class="btn btn-primary btn-lg">Realizar pago</a>
            </div>
        </div>
        <?php }?>

        
        </div>
    </main>                          
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Alerta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el medicamento del carrito?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btn-eliminar" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
     let eliminaModal = document.getElementById('eliminarModal')
        eliminaModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
            buttonElimina.value = id
        })
        
        function actualizacantidad(cantidad,id) {
            let url = 'clases/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'agregar');
            formData.append('id', id);
            formData.append('cantidad', cantidad);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let divsubtotal = document.getElementById("subtotal_"+id)
                        divsubtotal.innerHTML= data.sub

                        let  total = 0.00
                        let list =document.getElementsByName('subtotal[]')

                        for (let i = 0; i < list.length; i++ ){
                             total += parseFloat(list[i].innerHTML.replace(/[S/,]/g,''))
                        }
                        total = new Intl.NumberFormat('en-US',{
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML= '<?php echo MONEDA; ?>'+total
                    }
                })
        }

        function eliminar() {
             let botonElimina = document.getElementById('btn-eliminar')
             let id = botonElimina.value

            let url = 'clases/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('id', id);
 

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload()
                    }
                })
        }
    </script>

    
</body>
</html>




