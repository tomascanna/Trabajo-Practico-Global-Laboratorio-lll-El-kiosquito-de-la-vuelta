<?php
include('../php/BD.php');

if(isset($_GET['login'])){
    $user = "";
    $nombreCompleto ="";
    $password = "";
    $consulta = BaseDeDatos::generarConsulta("SELECT * FROM usuarios where user= '".$_POST['usuario']."'");

    while($row=mysqli_fetch_array($consulta)){
        $user = $row['user'];
        $nombreCompleto = $row['nombreCompleto'];
        $password = $row['contraseña'];
    }

    if(isset($_POST['recordarme'])){
        setcookie("userSession",$user,time() + 30*24*60*60);
        setcookie("passwordSession",$_POST['password'],time() + 30*24*60*60);
    }else{
        setcookie("userSession",$user,time() - 30*24*60*60);
        setcookie("passwordSession",$_POST['password'],time() - 30*24*60*60);
    }

    if($_POST['usuario']==$user && md5($_POST['password'])==$password){
        session_start();

        $_SESSION['usuario']=$user;
        $_SESSION['nombre']=$nombreCompleto;


        header("Location: panel.php");
    }else{
        header("Location: index.php?usuarioIncorrecto");
    }
     
}else if(isset($_GET['cerrarSesion'])){
    session_start();
    session_destroy();
    header("Location: index.php");
}
?>