<?php
class Producto{
  public static function mostrar($nombre,$precio,$img,$categoria,$marca){
    ?>
    <div class="producto col-xs-1 col-md-7 col-lg-4">
      <div class="card">
          <img src="<?=$img?>" class="card-img-top" alt="<?=$categoria,$marca?>">
          <div class="card-body">
            <h5 class="card-title"><?= $nombre ?></h5>
            <p class="card-text">Precio: $<?= $precio ?></p>
            <a href="#" class="btn btn-dark">Añadir al carrito</a>
          </div>
      </div>
    </div>
    <?php
  }

}
?>
