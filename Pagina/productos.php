<!DOCTYPE html>
<html lang="es">
<head>
  <?php include('php/meta.php');?> 
  <title>El kiosquito de la vuelta || Productos</title>
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
                            <h2>Productos</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section id="filtroYProductos">
                <div class="container">
                  <div class="row">
                      <div class="col filtroProductos">
                        <p>Filtro de busqueda</p>  
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Aseo del hogar</a></li>
                            <li class="list-group-item"><a href="#">Azúcar,endulzantes y mermeladas</a></li>
                            <li class="list-group-item"><a href="#">Cervezas</a></li>
                            <li class="list-group-item"><a href="#">Golosinas</a></li>
                            <li class="list-group-item"><a href="#">Gaseosas</a></li>
                        </ul>
                      </div>
    
                      <div class="col-10">
                        <div class="container">
                            <div class="row row row-cols-2 justify-content-start">
                                <?php
                                  for($i=0;$i<4;$i++){
                                    include('php/productosRectangulos.php');
                                  }
                                ?>
                            </div>        
                        </div>
                      </div>
                 </div>
            </section>
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

<!--

                            <ul class="list-group">
                                <li class="list-group-item">Aseo del hogar</li>
                                <li class="list-group-item">Azúcar,endulzantes y mermeladas</li>
                                <li class="list-group-item">Cervezas</li>
                                <li class="list-group-item">Golosinas</li>
                                <li class="list-group-item">Gaseosas</li>
                            </ul>

-->