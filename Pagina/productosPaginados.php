<?php
    require_once('php/BD.php');
    require_once('php/ElementosPagina/producto.php');
    require_once('php/carrito.php');
    $cant = 6; 
    $pag = (isset($_GET['p']))?$_GET['p']:1;
    $ini = ($pag-1) * $cant;

    if(isset($_GET['buscadorPrincipal'])){
        $busqueda = $_GET['buscadorPrincipal'];
        $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%' order by precio asc limit $ini, $cant");
        $resultadoconsultaFiltro= BaseDeDatos::generarConsulta("SELECT  DISTINCT categoria FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%'");
        $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%'");
        ?> <script>document.getElementById("buscadorPrincipal").value= "<?=$busqueda?>";</script><?php 
    }else if(isset($_GET['chkCategoria'])){
        $resultadochkCategoria = $_GET['chkCategoria'];
        $resultadoRangoHasta = $_GET['rangoHasta'];
        $resultadoRangoDesde = $_GET['rangoDesde'];
        $categoria="";
        //armo una cadena con todos los tipos de categoria para la consulta mysql
        for($i=0;$i<count($resultadochkCategoria);$i++){
            if($i==0){
                $categoria= "categoria='".$resultadochkCategoria[$i]."'";
            }else{
                $categoria.= " or categoria='".$resultadochkCategoria[$i]."'";
            }
        }

        if($resultadoRangoDesde!=0 && $resultadoRangoHasta!=0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where $categoria and precio<='".$resultadoRangoHasta."' and precio>='".$resultadoRangoDesde."' order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where $categoria and precio<='".$resultadoRangoHasta."' and precio>='".$resultadoRangoDesde."'");
        }else if($resultadoRangoDesde==0 && $resultadoRangoHasta!=0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where $categoria and precio<='".$resultadoRangoHasta."' order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where $categoria and precio<='".$resultadoRangoHasta."'");
        }else if($resultadoRangoHasta==0 && $resultadoRangoDesde!=0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where $categoria and precio>='".$resultadoRangoDesde."' order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where $categoria and precio>='".$resultadoRangoDesde."'");
        }else if($resultadoRangoHasta == 0 && $resultadoRangoDesde==0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where $categoria order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where $categoria");
        } 
        $resultadoconsultaFiltro= BaseDeDatos::generarConsulta("SELECT DISTINCT categoria FROM productos");
    }else{
        $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos order by precio asc limit $ini, $cant");
        $resultadoconsultaFiltro= BaseDeDatos::generarConsulta("SELECT DISTINCT categoria FROM productos");
        $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos");
    }
?>

<div class="row">
    <div class="col-xs col-sm- col-md-3 filtroBusqueda">
        <?php
        include('php/filtroDeProductos.php');
        ?>
    </div>

    <div class="col-xs-11 col-sm-11 col-md-9 Productos">
        <div class="row">
          <?php

            while($row=mysqli_fetch_array($resultadoconsulta)){
                Producto::mostrar($row['idproductos'],$row['cantidad'],$row['nombre'],$row['precio'],$row['imagen'],$row['categoria'],$row['marca']);                                
            }

            $r=mysqli_fetch_array($consultaCant);
            $cantidad = $r['cantidad'];
            $paginas = $cantidad / $cant;

            if($cantidad==0){
                echo("<h2>No se encontraron productos disponibles</h2>");
            }
          ?>
        </div>
                          
        <ul class="pagination"><?php
            for($i= 1; $i<=ceil($paginas);$i++){ ?>
                <li class="page-item"><a class="page-link" href="javascript:pagina(<?= $i ?>)"><?= $i?></a></li>
            <?php } ?>
        </ul>      
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>/*Establecer los resultados del filtrado*/
  var array = <?=json_encode($resultadochkCategoria);?>

  for(var i=0;i<array.length;i++){
    document.getElementById("chk"+array[i]).checked=true;
  }

  document.getElementById("rangoDesde").value=<?=$resultadoRangoDesde?>;
  document.getElementById("lblrangoDesde").innerHTML ="Desde: $<?=$resultadoRangoDesde?>";

  document.getElementById("rangoHasta").value=<?=$resultadoRangoHasta?>;
  document.getElementById("lblrangoHasta").innerHTML ="Hasta: $<?=$resultadoRangoHasta?>";
</script>
<script src="js/script.js"></script>