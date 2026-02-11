<?php
    function conectar(){
        include("../../../../configuracion.php");
        $conexion =  mysqli_connect("$direccion", "$usuario", "$passBd", "$bd");
        return $conexion;
    };

    function desconectar($descriptor){
        mysqli_close($descriptor);
    }

    function conectarI() { 
        include_once("../../../../configuracion.php");
        $conexion =  mysqli_connect("$direccion", "$usuario", "$passBd");
        return $conexion;
    }

?>