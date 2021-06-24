<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet"> 
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
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                              <label for="txtUsuario" class="form-label">Usuario:</label>
                              <input class="form-control" type="text" name="usuario" id="txtUsuario">
                            </div>
                            <div class="mb-3">
                              <label for="txtPassword" class="form-label">Password</label>
                              <input type="password" class="form-control" name="password" id="txtPassword">
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