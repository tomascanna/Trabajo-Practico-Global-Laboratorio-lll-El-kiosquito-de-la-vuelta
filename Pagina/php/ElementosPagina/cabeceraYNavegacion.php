<div id="cabecera">
    <div class="container">
        <div class="barraSuperior row justify-content-end">
            <div class="col-xs-1 col-lg-4">
                <a class="lblLogin" href="#" ><img src="icons/person-outline.svg">Iniciar Sesion</a>
                <a class="lblCarrito" href="#" ><img src="icons/bag.svg">Carrito</a>
            </div>
        </div>
        <!--Logo y buscador de la pagina-->
        <div class="logoYBuscador row row-cols-2 justify-content-center">
            <div class="logoYNombre col">
                <a href="index.php"><img src="img/logo/unnamed.png" alt="logo">El kiosquito de la vuelta</a>
            </div>

              <form action="buscarProducto.php" onsubmit="return validarBuscador()" method="get" class="buscador">
                <div class="row row-cols-2">
                    <div class="col"><input id="buscadorPrincipal" name="buscadorPrincipal" class="form-control me-2" type="search" placeholder="Ingrese el producto que desee buscar..." aria-label="Search"></div>
                    <div class="col"><input type="submit" value="Buscar" class="btn btn-primary"></div>
                </div>
              </form>
        </div>
        <!--FIN-Logo y buscador de la pagina-->
    </div>

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          Barra de navegacion
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="quienesSomos.php">Quienes Somos</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
</div>


<script>
  function validarBuscador(){
    var buscador = document.getElementById("buscadorPrincipal").value

    if(buscador==""){
      alert("Para poder buscar un producto debe ingresar el mismo en el buscador.")
      return false;
    }else{
      return true;
    }
  }
</script>