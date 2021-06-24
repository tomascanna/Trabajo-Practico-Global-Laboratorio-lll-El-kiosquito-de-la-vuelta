<?php
session_start();

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Añadir al carrito' :
            if(empty($_SESSION['Carrito'])){
                $producto=array('id'=>$_POST['id'],'nombre'=>$_POST['nombre'],'cantidad'=>$_POST['cantidad'],'precio'=>$_POST['precio']);
                $_SESSION['Carrito'][0]=$producto;
            }else{
                $producto=array('id'=>$_POST['id'],'nombre'=>$_POST['nombre'],'cantidad'=>$_POST['cantidad'],'precio'=>$_POST['precio']);
                $_SESSION['Carrito'][count($_SESSION['Carrito'])]=$producto;
            }
        break;

        case 'Eliminar':
            $id=$_POST['id'];
            foreach($_SESSION['Carrito'] as $indice=>$producto){
                if($producto['id']==$id){
                    unset($_SESSION['Carrito'][$indice]);
                    echo "<script> alert('el producto se elimino correctamente') </script>";
                }  
            }
        break;
    }
}


?>