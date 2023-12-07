<?php
if (!empty($_POST["btnmodificarproveedor"]) ) {
if(!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) &&
!empty($_POST["ruc"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"])) {

// Obtén los datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dni = $_POST["dni"];
$ruc = $_POST["ruc"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];

         $sql = $conexion->query("update proveedores set nombre='$nombre',apellido='$apellido',dni='$dni',
                                 ruc='$ruc', direccion='$direccion', correo='$correo' where id_proveedor=$id_proveedor" );
         if($sql==1) 
         {
            header("location:Menu.php?opcion=opcion2");
         }else{
            echo '<div class="alert alert-danger"> Error al modificar proveedor</div>';
         }
}else{
    echo '<div class = "alert alert-warning">ALGUNOS CAMPOS ESTAN VACIOS MI LOCO</div>';
}

}
?>