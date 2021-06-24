<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
if($_GET['id']!="" || !$_GET['id']!=null){
    $consulta=BaseDeDatos::generarConsulta("SELECT * FROM productos WHERE idproductos=".$_GET['id']."");
    $producto=mysqli_fetch_array($consulta);
    if($producto['imagen']!=null || $producto['imagen']!=""){
        unlink('../'.$producto['imagen']);
    }
    BaseDeDatos::generarConsulta("DELETE FROM productos WHERE idproductos=".$_GET['id']."");
    header("Location:panel.php?eliminadoCorrectamente");
}else{
    header("Location:panel.php?noEliminado");
}
?>

