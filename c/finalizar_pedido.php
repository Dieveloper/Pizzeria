<?php
session_start();
include_once '../m/pedidos.php';
include_once '../m/productos.php';

if (!isset($_SESSION['id_usuario']) || empty($_SESSION['carrito'])) {
    header("Location: ../v/index.php");
    exit();
}

$id_cliente = $_SESSION['id_usuario'];
$carrito = $_SESSION['carrito'];
$tipo_entrega = $_POST['tipo_entrega'];
$total_pedido = 0;

foreach ($carrito as $id_producto) {
    $producto = obtenerProductoPorId($id_producto);
    $total_pedido += $producto['precio_unitario'];
}


$id_pedido_nuevo = crearPedido($id_cliente, $tipo_entrega, $total_pedido);

if ($id_pedido_nuevo) {

    $carrito_agrupado = array_count_values($carrito);


    foreach ($carrito_agrupado as $id_prod => $cantidad) {
        guardarLineaPedido($id_pedido_nuevo, $id_prod, $cantidad);
    }

    unset($_SESSION['carrito']);
    header("Location: ../v/index.php?pedido=exito");
    exit();
} else {
    echo "Error al procesar el pedido.";
}