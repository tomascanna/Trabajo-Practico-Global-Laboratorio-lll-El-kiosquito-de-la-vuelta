<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

BaseDeDatos::generarConsulta("UPDATE `productos` SET `marca`='".$_GET['marca']."',`categoria`='".$_GET['categoria']."',`nombre`='".$_GET['nombre']."',`precio`='".$_GET['precio']."',`cantidad`='".$_GET['cantidad']."',`imagen`='img/productos/".$_GET['imagen']."',`oferta`='".$_GET['rbt']."' WHERE idproductos=".$_GET['idProducto']."");
header("Location: panel.php");
?>