<!DOCTYPE html>
<html lang="es">
<head>
    <?php require('php/meta.php');?> 
    <title>El kiosquito de la vuelta || Home</title>
</head>
<body>
    <div id="contenedorPrincipal" class="container">
        <header>
        
            <?php
               include('php/cabeceraYNavegacion.php');
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
            <section class="articulos">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                            for($i=0;$i<3;$i++){
                                include('php/producto.php');
                            }
                        ?>
                    </div>
                    
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                            for($i=0;$i<3;$i++){
                                include('php/producto.php');
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!--FIN - Seccion de los Articulos en Oferta-->
    
        </main>
        
        <aside>
    
        </aside>
        
        <footer>
            <?php
                include('php/footer.php');
            ?>    
        </footer>
    </div>
</body>
</html>



