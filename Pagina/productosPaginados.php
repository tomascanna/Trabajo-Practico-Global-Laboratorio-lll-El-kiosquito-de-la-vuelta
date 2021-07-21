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
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where ($categoria) and precio <='".$resultadoRangoHasta."' and precio >='".$resultadoRangoDesde."' order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where ($categoria) and precio <='".$resultadoRangoHasta."' and precio >='".$resultadoRangoDesde."'");
        }else if($resultadoRangoDesde==0 && $resultadoRangoHasta!=0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where ($categoria) and precio <='".$resultadoRangoHasta."' order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where ($categoria) and precio <='".$resultadoRangoHasta."'");
        }else if($resultadoRangoHasta==0 && $resultadoRangoDesde!=0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where ($categoria) and precio >='".$resultadoRangoDesde."' order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where ($categoria) and precio >='".$resultadoRangoDesde."'");
        }else if($resultadoRangoHasta == 0 && $resultadoRangoDesde==0){
          $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos where ($categoria) order by precio asc limit $ini, $cant");
          $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos where ($categoria)");
        } 
    }else{
        $resultadoconsulta=BaseDeDatos::generarConsulta("SELECT * FROM productos order by precio asc limit $ini, $cant");
        $consultaCant=BaseDeDatos::generarConsulta("SELECT count(*) cantidad FROM productos");
    }
    
?>



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
