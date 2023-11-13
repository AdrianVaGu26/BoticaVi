<?php
if (!empty($_POST["btnregistrar"]) ) {
if( !empty($_POST["correo"])AND !empty($_POST["contraseña"]) ){
         
         $id_persona=$_POST["id_persona"];
         $correo = $_POST["correo"];
         $contraseña=$_POST["contraseña"];
     
       
$sql1 = $conexion->query("update usuarios set correo='$correo',contraseña='$contraseña'
                          where id_persona=$id_persona" );
         if($sql1==1) 
         {
            header("location:index.php");
         }else{
            echo '<div class="alert alert-danger"> Error al modificar Usuario</div>';
         }
}else{
    echo '<div class = "alert alert-warning">ALGUNOS CAMPOS ESTAN VACIOS MI LOCO</div>';

}
}
?>