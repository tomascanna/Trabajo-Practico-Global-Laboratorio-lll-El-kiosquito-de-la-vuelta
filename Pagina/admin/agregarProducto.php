<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
if(!$_GET['marca']=="" || !$_GET['categoria']=="" || !$_GET['nombre']=="" || !$_GET['precio']=="" || !$_GET['cantidad']=="" || !$_GET['imagen']=="" || !$_GET['rbt']==""){
    BaseDeDatos::generarConsulta("INSERT INTO `productos`(`idproductos`, `marca`, `categoria`, `nombre`, `precio`, `cantidad`, `imagen`, `oferta`) VALUES ('','".$_GET['marca']."','".$_GET['categoria']."','".$_GET['nombre']."','".$_GET['precio']."','".$_GET['cantidad']."','img/productos/".$_GET['imagen']."','".$_GET['rbt']."')");
    header("Location: panel.php");
}else{
    echo "El producto no se pudo agregar. Por favor vuelva a intentar y verifique los campos cargados del formulario.";
}
?>