<?php
    require('php/BD.php');
    require('php/ElementosPagina/producto.php');
    require('php/carrito.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require('php/ElementosPagina/meta.php');?> 
  <title>El kiosquito de la vuelta || Productos</title>
</head>

<body>
    <div id="contenedorPrincipal" class="container">
      <header>
        <?php
          include('php/ElementosPagina/cabeceraYNavegacion.php');
        ?>
      </header>
    
        <main>
            
          <section class="lblSeccion">
              <div class="container">
                  <div class="row">
                      <div class="col">
                          <h2>Productos</h2>
                      </div>
                  </div>
              </div>
          </section>

          <section id="seccionProducto" class="seccionProductos align-item-center">
          <?php
            include('productosPaginados.php')
          ?>
          </section>
          
        </main>
        
        <footer>
          <?php
            include('php/ElementosPagina/footer.php');
          ?>
        </footer>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/script.js"></script>
