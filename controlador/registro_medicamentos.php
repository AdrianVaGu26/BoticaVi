<?php
if (!empty($_POST["btnregistrarmedicamentos"]) ) {
if(!empty($_POST["nombre"]) AND !empty($_POST["descripcion"]) AND !empty($_POST["precio"])
AND !empty($_POST["descuento"]) AND !empty($_POST["activo"])
AND !empty($_POST["fecha_vencimiento"])AND !empty($_POST["stock"])){

         $nombre = $_POST["nombre"];
         $descripcion = $_POST["descripcion"];
         $precio = $_POST["precio"];
         $descuento = $_POST["descuento"];
         $activo = $_POST["activo"];
         $fecha_vencimiento=$_POST["fecha_vencimiento"];
         $stock = $_POST["stock"];
     
         $sql = $conexion->query("insert into medicamentos(nombre,descripcion,precio,descuento,activo,fecha_vencimiento,stock)
         values ('$nombre','$descuento','$precio','$descuento','$activo','$fecha_vencimiento','$stock')");
         if($sql==1) 
         {
            echo '<div class="alert alert-success"> Persona Registrada correctamente</div>';
         }else{
            echo '<div class="alert alert-danger"> Error al registrar persona</div>';
         }
}else{
    echo '<div class = "alert alert-warning">ALGUNOS CAMPOS ESTAN VACIOS MI LOCO</div>';
}
}
?>