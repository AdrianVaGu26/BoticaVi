<?php 

define("KEY_TOKEN","SDSNMAVG-2009*");
define("MONEDA","S/");

session_start();



$num_cart = 0;

if(isset($_SESSION['carrito']['medicamentos'])){
    $num_cart = count($_SESSION['carrito']['medicamentos']);
}

?>