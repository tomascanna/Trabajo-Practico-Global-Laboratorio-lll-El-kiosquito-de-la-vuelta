
<?php
    require('php/BD.php');
    require('php/ElementosPagina/producto.php');
    require('php/carrito.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('php/ElementosPagina/meta.php');?> 
    <title>El kiosquito de la vuelta || Home</title>
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
                            <h2>Productos en oferta</h2>
                        </div>
                    </div>
                </div>
            </section>
            
            <!--Seccion de los Articulos en Oferta-->
            <section class="articulosEnOferta">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                            $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos WHERE oferta=1 order by precio asc");

                            while($row=mysqli_fetch_array($resultadoconsulta)){
                                Producto::mostrar($row['idproductos'],$row['cantidad'],$row['nombre'],$row['precio'],$row['imagen'],$row['categoria'],$row['marca']);                                
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!--FIN - Seccion de los Articulos en Oferta-->
    
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



