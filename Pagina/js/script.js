function cambiarValorHasta() {
    var valor = document.getElementById("rangoHasta").value;
    document.getElementById("lblrangoHasta").innerHTML = "Hasta:$" + valor;
}
  
function cambiarValorDesde() {
    var valor = document.getElementById("rangoDesde").value;
    document.getElementById("lblrangoDesde").innerHTML = "Desde:$" + valor;
}
  
function validarFiltro(){
  
    var checkboxes = document.getElementById("frmFiltroDeBusqueda").getElementsByClassName("chkCategoria");
    var array = Object.values(checkboxes);
    var chkActivos = 0; 
 
    for(var i=0;i<array.length;i++){
        if(array[i].checked){
            chkActivos++;
        }
    }
  
  
    if(chkActivos==0){
        alert("CUIDADO!!!. Para filtrar un producto debes seleccionar minimo alguna categorias");
        return false;
    }else{
        return true;
    }

}

function pagina(pagina){
    var query= window.location.search;
    if(query==""){
        query = "?";
    }
    $.ajax({url:"productosPaginados.php"+query+"&p="+pagina, 
    success: function(result){
        $("#seccionProducto").html(result);
    },error: function() {
    console.log("No se ha podido obtener la información");
}})};   

