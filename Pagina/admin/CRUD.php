<?php
include('../php/BD.php');

session_start();
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

if(isset($_GET['agregar'])){
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
} else if(isset($_GET['eliminar'])){
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
}else if(isset($_GET['modificar'])){
    if($_FILES['imagenSubida']['name'] != ""){
        $imagen = $_FILES['imagenSubida'];
        $_img = explode('.',$imagen['name']);
        $nombre = explode(' ',$_POST['nombre']);
        $imagenFinal = $nombre[0].$nombre[1].'.'.$_img[1];
        move_uploaded_file($imagen['tmp_name'],'../img/productos/'.$imagenFinal);
        $imagenFinal = 'img/productos/'.$imagenFinal;
    }else{
        $imagenFinal = $_POST['imagenBD'];
    }
    
    if($_POST['marca']!=null || $_POST['categoria']!=null || $_POST['nombre']!=null || $_POST['precio']!=null || $_POST['cantidad']!=null || $img!=null || $_POST['rbt']!=null){
       BaseDeDatos::generarConsulta("UPDATE `productos` SET `marca`='".$_POST['marca']."',`categoria`='".$_POST['categoria']."',`nombre`='".$_POST['nombre']."',`precio`='".$_POST['precio']."',`cantidad`='".$_POST['cantidad']."',`imagen`='".$imagenFinal."',`oferta`='".$_POST['rbt']."' WHERE idproductos=".$_POST['idProducto']."");
       header("Location: panel.php?modificadoCorrectamente");
       echo($imagenFinal);
    }else{
        header("Location: panel.php?nomodificado");
    }
}
?>