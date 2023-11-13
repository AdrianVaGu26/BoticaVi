<?php

if ( ! empty($_GET["id"]) ) {
    $id=$_GET["id"];
    $sql=$conexion->query("delete from persona where id_persona=$id");

    if ($sql==1){
        header("location: index.php");
    }else{
        echo '<div class="alert-danger">Error al eliminar mi bro</div>';
    }
}
if ( ! empty($_GET["id_persona"]) ) {
    $id=$_GET["id_persona"];
    $sql=$conexion->query("delete from usuarios where id_persona=$id");

    if ($sql==1){
        header("location: index.php");
    }else{
        echo '<div class="alert-danger">Error al eliminar mi bro</div>';
    }
}

?>