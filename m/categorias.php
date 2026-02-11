<?php
include_once("bd.php");

function crearCategorias($nombre){
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");
    $consulta = "INSERT INTO CATEGORIAS (nombre)
    VALUES ('$nombre')";
    $resultado = mysqli_query($conexion, $consulta);
}
function obtenerCategorias(){
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");
    
    $consulta = "SELECT * FROM CATEGORIAS";
    $resultado = mysqli_query($conexion, $consulta);
    
    return $resultado;
}

?>