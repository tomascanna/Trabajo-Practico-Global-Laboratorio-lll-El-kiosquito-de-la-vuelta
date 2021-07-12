<?php
include('../php/BD.php');
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
    include('index.php');
    ?>
    <script>
        var txtUsuario = document.getElementById("txtUsuario");
        var txtPassword =document.getElementById("txtPassword");
        txtUsuario.style.backgroundColor = "pink"
        txtUsuario.style.borderColor="red"
        txtPassword.style.backgroundColor = "pink"
        txtPassword.style.borderColor="red"
        document.getElementById("errorUsuario").innerHTML="El usuario o contraseña ingresado es incorrecto"
    </script>
    <?php
}
?>