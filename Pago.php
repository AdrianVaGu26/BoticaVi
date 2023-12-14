<?php
require_once 'config/config.php';
require_once 'config/databaseproductos.php';
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
}else{
    header("tiendaonline.php");
    exit;
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
                <a href="lista_carrito.php" class="btn btn-primary btn-sm me-2">
                    <i class="fas fa-shopping-cart"></i> Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                </a>

                
            </div>
        </div>
    </nav>
</header>
    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container"> 

         <div class="row">

         <div class="col-6">
            <h4>Detalles de pago</h4>
            <div id="paypal-button-container"></div>

        </div>
          <div class="col-6">

            <div class="table-responsive">
                <table class="table">
             <thead>
                <tr>
                    <th>Medicamento</th>
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
                        <td>
                            <div id="subtotal_<?php echo $id;?>" name="subtotal[]"><?php echo MONEDA.
                            number_format($subtotal,2,'.','.');?></div>
                        </td>
                    </tr>
                    <?php } ?>
                   <tr>
                    <td colspan="2">
                        <p class="h3 text-end" id ="total"><?php echo MONEDA.number_format($total,2,'.','.');
                        ?></p>
                    </td>
                </tr>


         </tbody>
         <?php } ?>
        </table>
        </div>
        </div>
    </div>
 </div>
    </main>                          

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
<input id="totaloculto" type="hidden" name="total" value="<?php echo $total; ?>" />

<script>
    var total = document.getElementById("totaloculto");

    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: parseInt(total.value)
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            let URL = 'clases/captura.php';

            actions.order.capture().then(function (detalles) {
                // Muestra un mensaje de éxito
                alert('Pago completado con éxito');

                // Enviar detalles al servidor
                enviarDetallesAlServidor(detalles);

                // Limpiar el carrito almacenado localmente
                localStorage.removeItem('carrito');

                // Redirigir a tiendaonline.php después de aceptar la alerta
                window.location.href = 'tiendaonline.php';
            });
        },
        onCancel: function (data) {
            alert("Pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');

    function enviarDetallesAlServidor(detalles) {
        // Crear un objeto FormData y agregar los detalles
        var form = new FormData();
        form.append("data", JSON.stringify(detalles));

        // Enviar los detalles al servidor
        fetch("http://localhost:3000/prueba.php", {
            method: "POST",
            body: new URLSearchParams(form)  // Utilizar URLSearchParams para codificar los datos
        })
        .then(response => response.json())
        .then(responseData => {
            // Redireccionar a la página con el ID de venta
            window.location.replace("http://localhost:3000/prueba.php?idventa=" + responseData.id);
        })
        .catch(error => {
            console.error('Error al enviar detalles al servidor:', error);
        });
    }
</script>




</body>
</html>