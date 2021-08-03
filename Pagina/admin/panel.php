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


        <section id="tablaProductos" class="tablaProductos table-responsive">
          <?php include('tablaProductos.php'); ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/administrador.js"></script>