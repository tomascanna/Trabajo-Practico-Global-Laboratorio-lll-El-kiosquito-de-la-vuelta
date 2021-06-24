<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

if(isset($_FILES['imagen'])){
    $imagen = $_FILES['imagen'];
    $_img = explode('.',$imagen['name']);
    $imagenFinal = $_POST['nombre'].'.'.$_img[1];
    move_uploaded_file($imagen['tmp_name'],'../img/productos/'.$imagenFinal);
}else{
    $imagenFinal = ''.$_POST['imagen'];
}

if($_POST['marca']!=null || $_POST['categoria']!=null || $_POST['nombre']!=null || $_POST['precio']!=null || $_POST['cantidad']!=null || $img!=null || $_POST['rbt']!=null){
    BaseDeDatos::generarConsulta("UPDATE `productos` SET `marca`='".$_POST['marca']."',`categoria`='".$_POST['categoria']."',`nombre`='".$_POST['nombre']."',`precio`='".$_POST['precio']."',`cantidad`='".$_POST['cantidad']."',`imagen`='".$imagenFinal."',`oferta`='".$_POST['rbt']."' WHERE idproductos=".$_POST['idProducto']."");
    header("Location: panel.php?modificadoCorrectamente");
}else{
    header("Location: panel.php?nomodificado");
}
?>