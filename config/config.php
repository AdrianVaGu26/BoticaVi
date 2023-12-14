<?php 
defined("CLIENT_ID") || define("CLIENT_ID","AZbUsQRwUlpX8pgULDaqpYQ7ZjiOVWAsZ1vdpqmYDFjusN7aoSpA5deocfPXoz8tBQy0y-n9TYzUFcoD");
define("CURRENCY","MXN");
define("KEY_TOKEN","SDSNMAVG-2009*");
define("MONEDA","S/");

session_start();



$num_cart = 0;

if(isset($_SESSION['carrito']['medicamentos'])){
    $num_cart = count($_SESSION['carrito']['medicamentos']);
}

?>