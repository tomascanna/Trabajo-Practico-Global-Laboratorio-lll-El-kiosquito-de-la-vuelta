<?php
require('../php/BD.php');

if(isset($_GET['login'])){
    $user = "";
    $nombreCompleto ="";
    $password = "";
    $passwordForm = $_POST['password'];
    $consulta = BaseDeDatos::generarConsulta("SELECT * FROM usuarios where user= '".$_POST['usuario']."'");

    while($row=mysqli_fetch_array($consulta)){
        $id=$row['idUsuario'];
        $user = $row['user'];
        $nombreCompleto = $row['nombreCompleto'];
        $password = $row['contraseña'];
    }

    $id = openssl_encrypt($id, "AES-128-ECB", "Kiosquito");

    if(isset($_POST['recordarme'])){
        setcookie("userSession",$id,time() + 30*24*60*60);
    }else{
        setcookie("userSession",$id,time() - 30*24*60*60);
    }

    if($_POST['usuario']==$user && ($passwordForm==$password || md5($passwordForm)==$password)){
        session_start();
        $_SESSION['usuario']=$user;
        $_SESSION['nombre']=$nombreCompleto;
        header("Location: panel.php?bienvenida=".$nombreCompleto);
    }else{
        header("Location: index.php?usuarioIncorrecto");
    }
     
}else if(isset($_GET['cerrarSesion'])){
    session_start();
    session_destroy();
    header("Location: index.php");
}
?>