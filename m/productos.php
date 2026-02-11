<?php
include_once("bd.php");

function crearProducto($id_categoria, $nombre, $descripcion, $imagen, $precio) {
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");

    $consulta = "INSERT INTO PRODUCTOS (id_categoria, nombre, descripcion, imagen, precio_unitario) 
                 VALUES ('$id_categoria', '$nombre', '$descripcion', '$imagen', '$precio')";
    $resultado = mysqli_query($conexion, $consulta);
    
    return $resultado;
}
function obtenerProductos() {
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");

    $consulta = "SELECT * FROM PRODUCTOS";
    $resultado = mysqli_query($conexion, $consulta);
    
    return $resultado;
}

function obtenerProductoPorId($id) {
    $conexion = conectar();
    $consulta = "SELECT * FROM PRODUCTOS WHERE id_producto = $id";
    $resultado = mysqli_query($conexion, $consulta);
    return mysqli_fetch_assoc($resultado);
}

function eliminarProducto($id) {
    $conexion = conectar();
    $consulta = "DELETE FROM PRODUCTOS WHERE id_producto = $id";
    return mysqli_query($conexion, $consulta);
}


function actualizarProducto($id, $nombre, $desc, $precio) {
    $conexion = conectar();
    $consulta = "UPDATE PRODUCTOS 
            SET nombre = '$nombre', 
                descripcion = '$desc', 
                precio_unitario = $precio 
            WHERE id_producto = $id";
    return mysqli_query($conexion, $consulta);
}

function eliminarReferenciasProducto($id) {
    $conexion = conectar();
    $consulta = "DELETE FROM LINEAS_PEDIDO WHERE id_producto = $id";
    return mysqli_query($conexion, $consulta);
}

function obtenerProductosPorCategoria($id_categoria) {
    $conexion = conectar();
    $sql = "SELECT * FROM PRODUCTOS WHERE id_categoria = $id_categoria";
    return mysqli_query($conexion, $sql);
}
?>