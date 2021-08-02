<?php
    require('../php/BD.php');
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: panel.php");
    }

    if(isset($_COOKIE['userSession'])){
        $id = $_COOKIE['userSession'];
        $id = openssl_decrypt($id, "AES-128-ECB", "Kiosquito");
        $consulta = BaseDeDatos::generarConsulta("SELECT * FROM usuarios where idUsuario= '".$id."'");
        $usuario = mysqli_fetch_array($consulta);
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <?php require('../php/ElementosPagina/meta.php');?>
    <title>EL kiosquito de la vuelta || ADMIN</title>
</head>
<body>
    <div class="container">
        <main>
            <section>
                <div class="logoYNombre col">
                    <a href="index.php"><img src="../img/logo/unnamed.png" alt="logo">El kiosquito de la vuelta</a>
                </div>
            </section>

            <section>
                <div class="loginAdministrador row">
                    <div class="col">
                        <form action="session.php?login" method="POST">
                            <div class="mb-3">
                              <label for="txtUsuario" class="form-label">Usuario:</label>
                              <input class="form-control" type="text" name="usuario" id="txtUsuario" value="<?= (isset($_COOKIE['userSession'])? $usuario['user'] : '' )?>">
                            </div>
                            <div class="mb-3">
                              <label for="txtPassword" class="form-label">Password</label>
                              <input type="password" class="form-control" name="password" id="txtPassword" value="<?= (isset($_COOKIE['userSession'])? $usuario['contraseña'] : '' )?>">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="recordarme" name="recordarme" value="recordarme" <?= (isset($_COOKIE['userSession'])? 'checked="true"' : '' )?>">
                                <label class="form-check-label" for="recordarme">Recordarme</label>
                            </div>
                            
                            <p id="errorUsuario" style="color:red;"></p>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </form>
                    </div>

                </div>
            </section>
        </main>
    </div>
</body>
</html>

<?php if(isset($_GET['usuarioIncorrecto'])){?>
<script>
        var txtUsuario = document.getElementById("txtUsuario");
        var txtPassword =document.getElementById("txtPassword");
        txtUsuario.style.backgroundColor = "pink"
        txtUsuario.style.borderColor="red"
        txtPassword.style.backgroundColor = "pink"
        txtPassword.style.borderColor="red"
        document.getElementById("errorUsuario").innerHTML="El usuario o contraseña ingresado es incorrecto"
        document.getElementById("recordarme").checked= false;
</script>
<?php } ?>