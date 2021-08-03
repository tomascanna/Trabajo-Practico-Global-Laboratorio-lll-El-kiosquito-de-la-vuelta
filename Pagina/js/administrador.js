function validarFormulario(formulario){
    var marca = document.getElementById("txtMarca");
    var nombre = document.getElementById("txtNombre");
    var categoria = document.getElementById("txtCategoria");
    var precio = document.getElementById("txtPrecio");
    var cantidad = document.getElementById("txtCantidad");
    var imagen = document.getElementById("imagen");
    var lblImagen = document.getElementById("txtImagen");
    var imagenBD = document.getElementById("imagenBD");
    var imagenSubida = document.getElementById("imagenSubida");
    var validacion = true;
    
    if(marca.value=="" || marca.value.length > 45 ){
        marca.style.borderColor="red";
        marca.style.backgroundColor="pink";
        validacion = false;
    }else{
        marca.style.borderColor="";
        marca.style.backgroundColor="white";
    }

    if(nombre.value=="" || nombre.value.length > 45 ){
        nombre.style.borderColor="red";
        nombre.style.backgroundColor="pink";
        validacion = false;
    }else{
        nombre.style.borderColor="";
        nombre.style.backgroundColor="white";
    }
    
    if(categoria.value=="" || categoria.value.length > 45){
        categoria.style.borderColor="red";
        categoria.style.backgroundColor="pink";
        validacion = false;
    }else{
        categoria.style.borderColor="";
        categoria.style.backgroundColor="white";
    }
    
    if(precio.value<=0 || precio.value.length > 4 ){
        precio.style.borderColor="red";
        precio.style.backgroundColor="pink";
        validacion = false;
    }else{
        precio.style.borderColor="";
        precio.style.backgroundColor="white";
    }
    
    if(cantidad.value<=0 || cantidad.value.length > 3 ){
        cantidad.style.borderColor="red";
        cantidad.style.backgroundColor="pink";
        validacion = false;
    }else{
        cantidad.style.borderColor="";
        cantidad.style.backgroundColor="white";
    }

    switch(formulario){
        case "agregar":
            if(imagen.value==""){
                lblImagen.innerHTML="Imagen: Seleccione una imagen para subir el producto";
                lblImagen.style.color="red";
                validacion = false;
            }else{
                lblImagen.innerHTML="Imagen:";
                lblImagen.style.color="black";
            }
            break;
        
        case "editar":
            if(imagenBD.value=="" && imagenSubida.value==""){
                lblImagen.innerHTML="Imagen: Seleccione una imagen para subir el producto";
                lblImagen.style.color="red";
                validacion = false;
            }else{
                lblImagen.innerHTML="Imagen:";
                lblImagen.style.color="black";
            }  
            break;  
    }

    

    return validacion;
           
}

function pagina(pagina){
    $.ajax({url:"tablaProductos.php?p="+pagina, 
    success: function(result){
        $("#tablaProductos").html(result);
    },error: function() {
    console.log("No se ha podido obtener la información");
}})}; 