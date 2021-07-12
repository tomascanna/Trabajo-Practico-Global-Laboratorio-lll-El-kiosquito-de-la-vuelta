<?php
    require('php/ElementosPagina/producto.php');
    require('php/carrito.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require('php/ElementosPagina/meta.php');?> 
    <title>El kiosquito de la vuelta || Carrito</title>
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
                            <h2>Carrito</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <table class="table table-striped table-light table-bordered text-center table-responsive">
                    <tr>
                        <th width="40%" class="text-center">Nombre</th>
                        <th width="15%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Precio</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%"></th>
                    </tr>
                    <?php 
                    
                    $total=0;
                    if(!empty($_SESSION['Carrito'])){
                        foreach($_SESSION['Carrito'] as $indice=>$producto){?>
                            <tr>
                                <td width="40%" class="text-center"><?= $producto['nombre'] ?></td>
                                <td width="15%" class="text-center"><?= $producto['cantidad'] ?></td>
                                <td width="20%" class="text-center">$<?= $producto['precio'] ?></td>
                                <td width="20%" class="text-center">$<?= $producto['precio']*$producto['cantidad'] ?></td>

                                <td width="5%">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $producto['id']?>">
                                    <input type="submit" name="btnAccion" value="Eliminar" class="btn btn-danger"> 
                                </form>    
                                </td>
                            </tr>
                        <?php 
                        $total=$total+($producto['precio']*$producto['cantidad']); 
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="3"><h3>Total</h3></td>
                        <td>$<?= $total ?></td>
                    </tr>                
                </table>
            </section>
    
        </main>
        
        <aside>
    
        </aside>
        
        <footer>
            <?php
                include('php/ElementosPagina/footer.php');
            ?>    
        </footer>
    </div>
</body>
</html>