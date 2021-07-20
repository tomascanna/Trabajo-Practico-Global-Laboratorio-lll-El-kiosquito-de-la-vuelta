
<?php
class Producto{
  public static function mostrar($id,$cantidad,$nombre,$precio,$img,$categoria,$marca){
    ?>
    <div class="producto col-xs-1 col-md-7 col-lg-4">
      <div class="card">
          <img src="<?=$img?>" class="card-img-top" alt="<?=$categoria,$marca?>">
          <div class="card-body">
            <h5 class="card-title"><?= $nombre ?></h5>
            <p class="card-text">Precio: $<?= $precio ?></p>
            <form action="" method="post">
              <input type="hidden" name="id" id="id" value=<?=$id?>>
              <input type="hidden" name="nombre" id="nombre" value="<?=$nombre?>">
              <input type="hidden" name="precio" id="precio" value=<?= $precio ?>>
              <input type="hidden" name="cantidad" id="cantidad" value=1>
              <input type="submit" name="btnAccion" value="Añadir al carrito" class="btn btn-dark"> 
            </form>
          </div>
      </div>
    </div>
    <?php
  }

}
?>
