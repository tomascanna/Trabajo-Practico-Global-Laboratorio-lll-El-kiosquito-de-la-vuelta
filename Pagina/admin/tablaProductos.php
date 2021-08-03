<?php
    require_once('../php/BD.php');
    $cant = 4; 
    $pag = (isset($_GET['p']))?$_GET['p']:1;
    $ini = ($pag-1) * $cant;

    $cabecera = BaseDeDatos:: generarConsulta("SHOW COLUMNS FROM productos");
    $elemento = BaseDeDatos:: generarConsulta("SELECT * FROM productos order by idproductos desc limit $ini,$cant");
    $consultaCant = BaseDeDatos :: generarConsulta("SELECT count(*) cantidad FROM productos");
    $consultaCant = mysqli_fetch_array($consultaCant);
    $cantidad = $consultaCant['cantidad'];
    $paginas = $cantidad / $cant;
    ?>
    <table class="table table-striped table-light table-bordered text-center table-responsive">
      <thead>
        <tr>
        <?php
          while($row=mysqli_fetch_array($cabecera)):
        ?>
          <th scope="col"><?= strtoUpper($row['Field']); ?></th>
        <?php 
        endwhile;
        ?>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row=mysqli_fetch_array($elemento)):
        ?>
        <tr>
        <th scope="row"><?=$row['idproductos']?></th>
        <td><?=$row['marca']?></td>
        <td><?=$row['categoria']?></td>
        <td><?=$row['nombre']?></td>
        <td><?="$".$row['precio']?></td>
        <td><?=$row['cantidad']?></td>
        <td><img src="../<?=$row['imagen']?>" alt="" style="width: 100px;"></td>  
        <td><?=($row['oferta']==1?'SI' : 'NO')?></td>
        <td><a href="frmEditarProducto.php?id=<?=$row['idproductos']?>" class="btn btn-success">Editar</a>
            <a href="CRUD.php?eliminar&id=<?=$row['idproductos']?>" class="btn btn-danger" onclick="return confirmacion('<?=$row['nombre']?>')">Eliminar</a>
        </td>
        </tr>
        <?php
        endwhile;
        ?>
      </tbody>
    </table>

    <ul class="pagination"><?php
        for($i= 1; $i<=ceil($paginas);$i++){ ?>
            <li class="page-item <?= ($pag==$i)?'active' : '' ?>"><a class="page-link" href="javascript:pagina(<?= $i ?>)"><?= $i?></a></li>
        <?php } ?>
    </ul>
  
  <div class="row">
      <a class="btn btn-dark" href="frmAgregar.php" type="button">Agregar Productos</a>
  </div>
