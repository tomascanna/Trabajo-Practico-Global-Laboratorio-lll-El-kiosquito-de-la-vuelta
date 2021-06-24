<?php
    require_once('php/BD.php');
    require_once('php/ElementosPagina/producto.php');
    require_once('php/carrito.php');
    $cant = 6; 
    $pag = (isset($_GET['p']))?$_GET['p']:1;
    $ini = ($pag-1) * $cant;
?>

            <div class="row">
                <div class="col-xs col-sm- col-md-3 filtroBusqueda">
                    <?php
                    include('php/filtroDeProductos.php');
                    ?>
                </div>

                <div class="col-xs-11 col-sm-11 col-md-9 Productos">
                    <div class="row">
                      <?php 
                          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos order by idproductos desc limit $ini, $cant");
                          while($row=mysqli_fetch_array($resultadoconsulta)){
                              Producto::mostrar($row['idproductos'],$row['cantidad'],$row['nombre'],$row['precio'],$row['imagen'],$row['categoria'],$row['marca']);                                
                          }
                      ?>
                    </div>
                        <?php
                            $queryCant = "SELECT count(*) cantidad FROM productos"; 
                            $consultaCant=BaseDeDatos::generarConsulta($queryCant);
                            $r=mysqli_fetch_array($consultaCant);
                            $cantidad = $r['cantidad'];
                            $paginas = $cantidad / $cant;
                        ?>
                            
                            <ul class="pagination"><?php
                                for($i= 1; $i<=ceil($paginas);$i++): ?>
                                    <li class="page-item"><a class="page-link" href="javascript:pagina(<?= $i ?>)"><?= $i?></a></li>
                                <?php endfor;?>
                            </ul>      
                </div>
            </div>
