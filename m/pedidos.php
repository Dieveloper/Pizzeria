<?php
include_once '../m/bd.php';

function crearPedido($id_cliente, $tipo_entrega, $precio){
    $conexion = conectar();
    $consulta = "INSERT INTO PEDIDOS (id_cliente, tipo_entrega, precio_total)
                 VALUES ('$id_cliente', '$tipo_entrega', '$precio')";
    
    if (mysqli_query($conexion, $consulta)) {
        return mysqli_insert_id($conexion); 
    }
    return false;
}

function guardarLineaPedido($id_pedido, $id_producto){
    $conexion = conectar();
    $consulta = "INSERT INTO LINEAS_PEDIDO (id_pedido, id_producto, cantidad)
                 VALUES ('$id_pedido', '$id_producto', 1)";
    
    return mysqli_query($conexion, $consulta);
}

function obtenerPedidosPorCliente($id_cliente) {
    $conexion = conectar();
    $sql = "SELECT * FROM PEDIDOS WHERE id_cliente = $id_cliente ORDER BY id_pedido DESC";
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
}


function obtenerLineasDetalle($id_pedido) {
    $conexion = conectar();

    $sql = "SELECT L.*, P.nombre, P.precio_unitario 
            FROM LINEAS_PEDIDO L
            JOIN PRODUCTOS P ON L.id_producto = P.id_producto
            WHERE L.id_pedido = $id_pedido";
            
    return mysqli_query($conexion, $sql);
}

function obtenerPedidoPorId($id_pedido) {
    $conexion = conectar();
    $sql = "SELECT * FROM PEDIDOS WHERE id_pedido = $id_pedido";
    $res = mysqli_query($conexion, $sql);
    return mysqli_fetch_assoc($res);
}

function borrarLinea($id_product) {
    $conexion = conectar();
    $consulta = "DELETE FROM LINEAS_PEDIDO WHERE id_producto = $id_product";
    mysqli_query($conexion, $consulta);
}