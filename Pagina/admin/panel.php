<?php
    include('../php/BD.php');
    session_start();
    if(empty($_SESSION['usuario'])){
        header("Location: index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>El kiosquito de la vuelta || ABM</title>
</head>


<body>
    <div class="administrador container">
      <header>
        <a class="lblCerrarSesion" href="session.php?cerrarSesion" ><img src="../icons/cerrarSesion.svg">Cerrar Sesión</a>
      </header>


      <main>
        <section class="lblSeccion">
          <div class="container">
              <div class="row">
                <div class="col">
                  <h2>Panel de Control</h2>
                  <?php include('alertas.php') ?>
                </div>
              </div>
          </div>
        </section>

        <?php
          $cabecera = BaseDeDatos:: generarConsulta("SHOW COLUMNS FROM productos");
          $elemento = BaseDeDatos:: generarConsulta("SELECT * FROM productos");
        ?>
        <section class="tablaProductos table-responsive">
          
            <table class="table table-striped table-light table-bordered text-center table-responsive">
              <thead>
                <tr>
                <?php
                  while($row=mysqli_fetch_array($cabecera)):
                ?>
                  <th scope="col"><?= strtoUpper($row['Field']); ?></th>
                <?php 
                endwhile;
                ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  while($row=mysqli_fetch_array($elemento)):
                ?>
                <tr>
                <th scope="row"><?=$row['idproductos']?></th>
                <td><?=$row['marca']?></td>
                <td><?=$row['categoria']?></td>
                <td><?=$row['nombre']?></td>
                <td><?="$".$row['precio']?></td>
                <td><?=$row['cantidad']?></td>
                <td><img src="../<?=$row['imagen']?>" alt="" style="width: 100px;"></td>  
                <td><?=($row['oferta']==1?'SI' : 'NO')?></td>
                <td><a href="frmEditarProducto.php?id=<?=$row['idproductos']?>" class="btn btn-success">Editar</a>
                    <a href="CRUD.php?eliminar&id=<?=$row['idproductos']?>" class="btn btn-danger" onclick="return confirmacion('<?=$row['nombre']?>')">Eliminar</a>
                </td>
                </tr>
                <?php
                endwhile;
                ?>
              </tbody>
            </table>
          

          <div class="row">
              <a class="btn btn-dark" href="frmAgregar.php" type="button">Agregar Productos</a>
          </div>
        </section>
      </main>

    </div>
</body>
</html>


<script>
  function confirmacion(nombre){
    return confirm("Desea eliminar el elemento "+nombre+" de la base de datos?")
  }
</script>