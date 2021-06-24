<?php
    
    require('php/BD.php');
    require('php/ElementosPagina/producto.php');
    require('php/carrito.php');

    $resultadochkCategoria = $_GET['chkCategoria'];
    $resultadoRangoHasta = $_GET['rangoHasta'];
    $resultadoRangoDesde = $_GET['rangoDesde'];
    if(!$resultadochkCategoria){header("Location:productos.php");}
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
                  include('php/filtroDeProductos.php');
                ?>
                
                <script>

                </script>
              </div>

              <div class="col-xs-11 col-sm-11 col-md-9 Productos">
                <div class="row">
                    <?php
                        for($i=0;$i<count($resultadochkCategoria);$i++){
                          if($resultadoRangoDesde!=0 && $resultadoRangoHasta!=0){
                            $consulta="SELECT * FROM kiosco.productos where categoria = '".$resultadochkCategoria[$i]."' and precio<='".$resultadoRangoHasta."' and precio>='".$resultadoRangoDesde."'";
                          }else if($resultadoRangoDesde==0 && $resultadoRangoHasta!=0){
                            $consulta="SELECT * FROM kiosco.productos where categoria = '".$resultadochkCategoria[$i]."' and precio<='".$resultadoRangoHasta."'";
                          }else if($resultadoRangoHasta==0 && $resultadoRangoDesde!=0){
                            $consulta="SELECT * FROM kiosco.productos where categoria = '".$resultadochkCategoria[$i]."' and precio>='".$resultadoRangoDesde."'";
                          }else if($resultadoRangoHasta == 0 && $resultadoRangoDesde==0){
                            $consulta="SELECT * FROM kiosco.productos where categoria = '".$resultadochkCategoria[$i]."'";
                          }
                          $resultadoconsulta=BaseDeDatos::generarConsulta($consulta);
                          while($row=mysqli_fetch_array($resultadoconsulta)){
                              Producto::mostrar($row['idproductos'],$row['cantidad'],$row['nombre'],$row['precio'],$row['imagen'],$row['categoria'],$row['marca']);                                 
                          }
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

<script src="js/script.js"></script>

<script>/*Establecer los resultados del filtrado*/
  var array = <?=json_encode($resultadochkCategoria);?>

  for(var i=0;i<array.length;i++){
  document.getElementById("chk"+array[i]).checked=true;
  }

  document.getElementById("rangoDesde").value=<?=$resultadoRangoDesde?>;
  document.getElementById("lblrangoDesde").innerHTML ="Desde: $<?=$resultadoRangoDesde?>";

  document.getElementById("rangoHasta").value=<?=$resultadoRangoHasta?>;
  document.getElementById("lblrangoHasta").innerHTML ="Hasta: $<?=$resultadoRangoHasta?>";
</script>