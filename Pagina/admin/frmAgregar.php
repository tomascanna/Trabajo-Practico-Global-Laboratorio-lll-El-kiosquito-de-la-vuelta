<?php
    session_start();
    if(empty($_SESSION['usuario'])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../php/ElementosPagina/meta.php');?>
    <title>Agregar Producto</title>
</head>
<body>
    <div class="administrador container">

        <main> 
            <div class="row lblSeccionAdmin">
                <h3>Agregar Producto</h3>
            </div>
            <section class="frmAdministrador">   
                <form action="CRUD.php?agregar" method="post" onSubmit="return validarFormulario('agregar')" enctype="multipart/form-data">
                    <label for="txtMarca">Marca:</label><br>
                    <input type="text" name="marca" id="txtMarca"><br>

                    <label for="txtCategoria">Categoria: </label><br>
                    <input type="text" name="categoria" id="txtCategoria"><br>

                    <label for="txtNombre">Nombre: </label><br>
                    <input type="text" name="nombre" id="txtNombre"><br>

                    <label for="txtPrecio">Precio: </label><br>
                    <input type="number" name="precio" id="txtPrecio"><br>

                    <label for="txtCantidad">Cantidad: </label><br>
                    <input type="number" name="cantidad" id="txtCantidad"><br>

                    <label id="txtImagen" for="txtImagen">Imagen: </label><br>
                    <input type="file" name="imagen" id="imagen" accept=".jpg , .png , .webp"><br><br> 

                    <label for="">Oferta:</label>
                    <label for="rbtSI">SI</label>
                    <input type="radio" name="rbt" id="rbtSI" value=1 checked>
                    <label for="rbtNo">NO</label>
                    <input type="radio" name="rbt" id="rbtNo" value=0>
                    <br><br>
                    <input class="btn btn-success"type="submit" value="Agregar Producto">
                </form>
            </section>
        
        </main>
    </div>
    
</body>
</html>
<script src="../js/administrador.js"></script>