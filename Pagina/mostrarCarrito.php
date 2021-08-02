<?php
    require('php/carrito.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('php/ElementosPagina/meta.php');?> 
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

            <section class="tablaCarrito">
                <?php
                $total=0;
                if(isset($_SESSION['Carrito']) && count($_SESSION['Carrito'])!=0){?>
                    <table class="table table-striped table-light table-bordered text-center table-responsive">
                        <tr>
                            <th width="35%" class="text-center">Nombre</th>
                            <th width="20%" class="text-center">Cantidad</th>
                            <th width="25%" class="text-center">Precio</th>
                            <th width="10%"></th>
                        </tr>
                            <?php
                            foreach($_SESSION['Carrito'] as $indice=>$producto){?>
                                <tr>
                                    <td width="35%" class="text-center"><?= $producto['nombre'] ?></td>
                                    <td width="20%" class="text-center"><?= $producto['cantidad'] ?></td>
                                    <td width="25%" class="text-center">$<?= $producto['precio'] ?></td>

                                    <td width="10%">
                                    <form action="" method="post" onclick="return confirmar()">
                                        <input type="hidden" name="id" value="<?= $producto['id']?>">
                                        <input type="submit" name="btnAccion" value="Eliminar" class="btn btn-danger"> 
                                    </form>    
                                    </td>
                                </tr>
                            <?php 
                            $total=$total+$producto['precio']; 
                            }
                        
                        ?>
                        <tr>
                            <td colspan="3"><h3>Total</h3></td>
                            <td>$<?= $total ?></td>
                        </tr>                
                    </table>
                <?php
                }else{
                    echo("<h2>No hay productos en el carrito</h2>");
                } ?>
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

<script>
    function confirmar(){
        return confirm("Desea eliminar el producto del carrito?");
    }
    
</script>