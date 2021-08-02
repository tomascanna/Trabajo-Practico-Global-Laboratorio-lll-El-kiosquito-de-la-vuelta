<?php
    require('../php/BD.php');
    session_start();
    if(empty($_SESSION['usuario'])){
        header("Location: index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../php/ElementosPagina/meta.php');?>
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


        <section class="tablaProductos table-responsive">
          <?php
            $cabecera = BaseDeDatos:: generarConsulta("SHOW COLUMNS FROM productos");
            $elemento = BaseDeDatos:: generarConsulta("SELECT * FROM productos");
          ?>
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