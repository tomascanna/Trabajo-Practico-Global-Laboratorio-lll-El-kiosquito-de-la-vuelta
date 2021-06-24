<?php
    require('php/BD.php');
    require('php/ElementosPagina/producto.php');
    require('php/carrito.php');
    $busqueda = $_GET['buscadorPrincipal'];
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

          <section class="seccionProductos align-item-center">
            <div class="row">
              <div class="col-xs col-sm- col-md-3 filtroBusqueda">
                <?php
                  include('filtroBusquedaDeProducto.php');
                ?>
              </div>

              <div class="col-xs-11 col-sm-11 col-md-9 Productos">
                <div class="row">
                  <?php 
                    $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%'");
                    while($row=mysqli_fetch_array($resultadoconsulta)){
                      Producto::mostrar($row['idproductos'],$row['cantidad'],$row['nombre'],$row['precio'],$row['imagen'],$row['categoria'],$row['marca']);                                
                    }
                  ?>
                </div>
                
              </div>
            </div>
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

<script>
  document.getElementById("buscadorPrincipal").value= "<?=$busqueda?>";
</script>
<script src="js/script.js"></script>