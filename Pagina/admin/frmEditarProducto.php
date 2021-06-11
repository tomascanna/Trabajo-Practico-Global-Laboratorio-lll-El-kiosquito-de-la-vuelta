<?php
    session_start();
    if(empty($_SESSION['usuario'])){
        header("Location: index.php");
        exit();
    }
include('../php/BD.php');
$id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="administrador container">
        <main>
            <div class="row lblSeccionAdmin">
                <h3>Editar Producto</h3>
            </div>
            <section class="frmAdministrador">
                <form action="modificarProducto.php" method="get" onSubmit="return validarEditarProducto()">
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
                    <input type="file" name="imagen" id="txtImagen" accept=".jpg , .png , .webp" value="<?=$row['imagen']?>"><br><br> 
                    
                    <?php
                    if(!$row['oferta']){
                    ?>
                    <label for="">Oferta:</label>
                    <label for="rbtSI">SI</label>
                    <input type="radio" name="rbt" id="rbtSI" value=1>
                    <label for="rbtNo">NO</label>
                    <input type="radio" name="rbt" id="rbtNo" value=0 checked>
                    <br><br>
                    <?php
                    }else{
                    ?>
                    <label for="">Oferta:</label>
                    <label for="rbtSI">SI</label>
                    <input type="radio" name="rbt" id="rbtSI" value=1 checked>
                    <label for="rbtNo">NO</label>
                    <input type="radio" name="rbt" id="rbtNo" value=0>
                    <br><br>
                    <?php } ?>
                    <input class="btn btn-success" type="submit" value="Modificar Producto">
                    <input type="hidden" name="idProducto" value="<?= $id ?>">
                    <?php
                    endwhile;
                    ?>
                </form>
            </section>
        </main>
    </div>

</body>
</html>


<script>
    function validarEditarProducto(){
        var marca = document.getElementById("txtMarca");
        var categoria = document.getElementById("txtCategoria");
        var precio = document.getElementById("txtPrecio");
        var cantidad = document.getElementById("txtCantidad");
        var imagen = document.getElementById("txtImagen");


        if(marca.value=="" || categoria.value=="" || precio.value==0 || cantidad.value==0 || imagen.value==""){
            alert("Para agregar un producto todos los campos deben estar completos");
            return false;
            
        }else{
            return true;
            alert("El producto se agrego correctamente");
        }
    }
</script>

<script>

</script>