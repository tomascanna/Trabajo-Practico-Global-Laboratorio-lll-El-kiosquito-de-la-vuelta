<?php 
    if(isset($_GET['buscadorPrincipal'])){
        $busqueda = $_GET['buscadorPrincipal'];
        $resultadoconsultaFiltro= BaseDeDatos::generarConsulta("SELECT  DISTINCT categoria FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%'");
        ?> <script>document.getElementById("buscadorPrincipal").value= "<?=$busqueda?>";</script><?php 
    }else{
        $resultadoconsultaFiltro= BaseDeDatos::generarConsulta("SELECT DISTINCT categoria FROM productos");
    }


?>

<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Filtrá tu Búsqueda
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
               <form id="frmFiltroDeBusqueda" action="productos.php" method="get" onSubmit="return validarFiltro()">                            
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Categorias</li>
                               
                        <?php
                            while($row=mysqli_fetch_array($resultadoconsultaFiltro)):
                                ?>
                                <li class="list-group-item">
                                    <input id="chk<?=$row['categoria'];?>" class="chkCategoria" type="checkbox" name="chkCategoria[]" value="<?=$row['categoria'];?>">
                                    <label for="<?=$row['categoria'];?>"><?=$row['categoria'];?><label>
                                </li>
                                <?php
                            endwhile;
                        ?>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Precio</li>
                        <li class="list-group-item">
                            <label id="lblrangoDesde" for="rangoDesde">Desde</label>
                            <input type="range" class="form-range" min="0" max="5600" id="rangoDesde" name="rangoDesde" oninput="cambiarValorDesde()" value="0">
                        </li>
                           
                        <li class="list-group-item">
                            <label id="lblrangoHasta" for="rangoDesde">Hasta</label>
                            <input type="range" class="form-range" min="0" max="5600" id="rangoHasta" name="rangoHasta" oninput="cambiarValorHasta()" value="0">
                        </li>
                    </ul>
                        
                    <input class="btn btn-primary" type="submit" value="Aplicar filtros">
                </form>     
            </div>
        </div>
    </div>
</div>




