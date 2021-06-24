<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

if($_POST['marca']!=null || $_POST['categoria']!=null || $_POST['nombre']!=null || $_POST['precio']!=null || $_POST['cantidad']!=null || $_FILES['imagen']!=null || $_POST['rbt']!=null){
    $imagen=$_FILES['imagen'];
    $_img = explode('.',$imagen['name']);
    $imagenFinal = $_POST['nombre'].'.'.$_img[1];
    move_uploaded_file($imagen['tmp_name'],'../img/productos/'.$imagenFinal);
    BaseDeDatos::generarConsulta("INSERT INTO `productos`(`idproductos`, `marca`, `categoria`, `nombre`, `precio`, `cantidad`, `imagen`, `oferta`) VALUES ('','".$_POST['marca']."','".$_POST['categoria']."','".$_POST['nombre']."','".$_POST['precio']."','".$_POST['cantidad']."','img/productos/".$imagenFinal."','".$_POST['rbt']."')");
    header("Location: panel.php?productoAgregado");
}else{
    header("Location: panel.php?noAgregado");   
}
?>