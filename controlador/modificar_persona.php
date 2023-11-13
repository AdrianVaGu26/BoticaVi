<?php
if (!empty($_POST["btnregistrar"]) ) {
if(!empty($_POST["nombre"]) AND !empty($_POST["apellido"]) AND !empty($_POST["dni"])
AND !empty($_POST["fecha"])){
         $id=$_POST["id"];
         $nombre = $_POST["nombre"];
         $apellido = $_POST["apellido"];
         $dni = $_POST["dni"];
         $fecha = $_POST["fecha"];
     
         $sql = $conexion->query("update persona set nombre='$nombre',apellido='$apellido',dni='$dni',
                                 fecha_nac='$fecha' where id_persona=$id" );
         if($sql==1) 
         {
            header("location:index.php");
         }else{
            echo '<div class="alert alert-danger"> Error al modificar persona</div>';
         }
}else{
    echo '<div class = "alert alert-warning">ALGUNOS CAMPOS ESTAN VACIOS MI LOCO</div>';
}

}
?>