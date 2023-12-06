<?php

if ( ! empty($_GET["id_proveedor"]) ) {
    $id=$_GET["id_proveedor"];
    $sql=$conexion->query("delete from proveedores where id_proveedor=$id");

    if ($sql==1){
        header("location: Menu.php?opcion=opcion2");
    }else{
        echo '<div class="alert-danger">Error al eliminar mi bro</div>';
    }
}
