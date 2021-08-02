<?php
 if(isset($_GET['bienvenida'])){
    echo"<div class='alert alert-success' role='alert'>
            Bienvenido ".$_GET['bienvenida']."!
         </div>"; 
 }else if(isset($_GET['productoAgregado'])){
    echo"<div class='alert alert-success' role='alert'>
            Producto agregado correctamente.
        </div>"; 
}else if(isset($_GET['eliminadoCorrectamente'])){
    echo"<div class='alert alert-success' role='alert'>
            Producto eliminado correctamente.
        </div>";
}else if(isset($_GET['modificadoCorrectamente'])){ 
    echo "<div class='alert alert-success' role='alert'>
            Producto modificado correctamente.
        </div>";
}else if(isset($_GET['noAgregado'])){ 
    echo "<div class='alert alert-danger' role='alert'>
            No se pudo agregar el producto.
          </div>";
}else if(isset($_GET['noEliminado'])){ 
    echo "<div class='alert alert-danger' role='alert'>
            No se pudo eliminar el producto.
          </div>";
}else if(isset($_GET['noModificado'])){ 
    echo "<div class='alert alert-danger' role='alert'>
            El producto no se pudo modificar.
          </div>";
}

?> 