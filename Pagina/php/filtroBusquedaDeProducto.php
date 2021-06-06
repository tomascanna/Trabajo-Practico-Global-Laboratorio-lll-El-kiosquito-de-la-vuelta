<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Filtrá tu Búsqueda
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <form action="filtrarBusqueda.php" method="get" onSubmit="return validarFiltro()">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Marca</li>
                            <?php
                                $resultadoconsulta= BaseDeDatos::generarConsulta("SELECT  DISTINCT marca FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%'");
                                while($row=mysqli_fetch_array($resultadoconsulta)):
                                    ?>
                                    <li class="list-group-item">
                                        <input type="checkbox" name="chkMarca[]" id="chkMarca" value="<?=$row['marca'];?>">
                                        <label for="<?=$row['marca']?>"><?=$row['marca'];?></label>
                                    </li>
                                    <?php
                                endwhile;
                            ?>
                    </ul>
                            
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Categorias</li>
                               
                        <?php
                            $resultadoconsulta= BaseDeDatos::generarConsulta("SELECT  DISTINCT categoria FROM productos where marca like '%".$busqueda."%' or categoria like '%".$busqueda."%' or nombre like '%".$busqueda."%'");
                            while($row=mysqli_fetch_array($resultadoconsulta)):
                                ?>
                                <li class="list-group-item">
                                    <input type="checkbox" name="chkCategoria[]" value="<?=$row['categoria'];?>">
                                    <label for="<?=$row['categoria'];?>"><?=$row['categoria'];?><label>
                                </li>
                                <?php
                            endwhile;
                        ?>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Precio</li>
                        <li class="list-group-item">
                            <label for="">Desde</label>
                            <input type="range" class="form-range" min="1" max="5600" id="rangoDesde">
                        </li>
                           
                        <li class="list-group-item">
                            <label for="">Hasta</label>
                            <input type="range" class="form-range" min="1" max="5600" id="rangoHasta">
                        </li>
                    </ul>
                        
                    <input class="btn btn-primary" type="submit" value="Aplicar filtros">
                </form>     
            </div>
        </div>
    </div>
</div>
