<?php
    session_start();
    if(empty($_SESSION['usuario'])){
        header("Location: index.php");
        exit();
    }
require('../php/BD.php');
$id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../php/ElementosPagina/meta.php');?>
    <title>Editar Producto</title>
</head>

<body>
    <div class="administrador container">
        <main>
            <div class="row lblSeccionAdmin">
                <h3>Editar Producto</h3>
            </div>
            <section class="frmAdministrador">
                <form action="CRUD.php?modificar" method="post" onSubmit="return validarFormulario('editar')" enctype="multipart/form-data">
                    <?php
                    $consulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where idproductos=".$id."");
                    while($row=mysqli_fetch_array($consulta)):
                    ?>
                        <label for="txtMarca">Marca:</label><br>
                        <input type="text" name="marca" id="txtMarca" value="<?=$row['marca']?>"><br>
                        
                        <label for="txtCategoria">Categoria</label><br>
                        <input type="text" name="categoria" id="txtCategoria" value="<?=$row['categoria']?>"><br>
                        
                        <label for="txtNombre">Nombre</label><br>
                        <input type="text" name="nombre" id="txtNombre" value="<?=$row['nombre']?>"><br>
                        
                        <label for="txtPrecio">Precio: </label><br>
                        <input type="number" name="precio" id="txtPrecio" value=<?=$row['precio']?>><br>
                        
                        <label for="txtCantidad">Cantidad: </label><br>
                        <input type="number" name="cantidad" id="txtCantidad"value=<?=$row['cantidad']?>><br>
                        
                        <label for="txtImagen">Imagen: </label><br>

                        <img src="../<?=$row['imagen']?>" alt="<?=$row['imagen']?>" style="width: 200px;"><br>
                        <input type="hidden" name="imagenBD" id="imagenBD" value="<?=$row['imagen']?>">
                        <label id="txtImagen" for="txtImagen">Imagen: </label><br>
                        <input id="imagenSubida" type="file" name="imagenSubida" accept=".jpg , .png , .webp"><br><br> 


                        <label for="">Oferta:</label>
                        <label for="rbtSI">SI</label>
                        <input type="radio" name="rbt" id="rbtSI" value=1 <?= ($row['oferta'])? 'checked' : '' ?>>
                        <label for="rbtNo">NO</label>
                        <input type="radio" name="rbt" id="rbtNo" value=0 <?= (!$row['oferta'])? 'checked' : '' ?>>
                        <br><br>    
                    <?php endwhile;?>
                    <input class="btn btn-success" type="submit" value="Modificar Producto">
                    <input type="hidden" name="idProducto" value="<?= $id ?>">
                </form>
            </section>
        </main>
    </div>

</body>
</html>
<script src="../js/administrador.js"></script>

