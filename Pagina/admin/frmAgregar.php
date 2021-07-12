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
                <h3>Agregar Producto</h3>
            </div>
            <section class="frmAdministrador">   
                <form action="agregarProducto.php" method="post" onSubmit="return validarAgregarProductos()" enctype="multipart/form-data">
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

                    <label for="txtImagen">Imagen: </label><br>
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


<script>
    function validarAgregarProductos(){
        var marca = document.getElementById("txtMarca");
        var nombre = document.getElementById("txtNombre");
        var categoria = document.getElementById("txtCategoria");
        var precio = document.getElementById("txtPrecio");
        var cantidad = document.getElementById("txtCantidad");
        var imagen = document.getElementById("txtImagen");
        var validacion = true;
        

        if(marca.value=="" || marca.value.length > 45 ){
            marca.style.borderColor="red";
            marca.style.backgroundColor="pink";
            alert("Revise los datos del campo MARCA");
            validacion = false;
        }

        if(nombre.value=="" || nombre.value.length > 45 ){
            nombre.style.borderColor="red";
            nombre.style.backgroundColor="pink";
            alert("Revise los datos del campo Nombre");
            validacion = false;
        }
        
        if(categoria.value=="" || categoria.value.length > 45){
            categoria.style.borderColor="red";
            categoria.style.backgroundColor="pink";
            alert("Revise los datos del campo CATEGORIA");
            validacion = false;
        }
        
        if(precio.value<=0 || precio.value.length > 4 ){
            precio.style.borderColor="red";
            precio.style.backgroundColor="pink";
            alert("Revise los datos del campo PRECIO");
            validacion = false;
        }
        
        if(cantidad.value<=0 || cantidad.value.length > 3 ){
            cantidad.style.borderColor="red";
            cantidad.style.backgroundColor="pink";
            alert("Revise los datos del campo CANTIDAD");
            validacion = false;
        }

        return validacion;
            
        
    }
</script>