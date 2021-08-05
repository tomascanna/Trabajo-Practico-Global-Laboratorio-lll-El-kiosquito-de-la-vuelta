<?php

class BaseDeDatos {
    
    public static function generarConsulta($consulta){
        // Creamos la conexión
        $con = mysqli_connect("localhost", "root", "", "kiosco");
        // Comprobamos la conexión
        if (!$con) {
            die("La conexión ha fallado");
        } 
        $resultado=mysqli_query($con,$consulta);
        mysqli_close($con);
        return $resultado; 
    }

}



?>