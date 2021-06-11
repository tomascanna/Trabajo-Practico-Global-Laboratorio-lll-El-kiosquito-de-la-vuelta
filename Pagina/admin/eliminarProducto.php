<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
if($_GET['id']!="" || !$_GET['id']!=null){
    BaseDeDatos::generarConsulta("DELETE from productos WHERE idproductos=".$_GET['id']."");
    echo "<script> 
    alert('El producto se elimino correctamente'); 
    window.location='panel.php'; 
    </script>";
}else{
    echo "<script> 
    alert('El producto NO se pudo eliminar correctamente'); 
    window.location='panel.php'; 
    </script>";
}
?>

