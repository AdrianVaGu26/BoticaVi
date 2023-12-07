<?php

if ( ! empty($_GET["id"]) ) {
    $id=$_GET["id"];
    $sql=$conexion->query("delete from medicamentos where id=$id");

    if ($sql==1){
        header("location: Menu.php?opcion=opcion0");
    }else{
        echo '<div class="alert-danger">Error al eliminar mi bro</div>';
    }
}
