<?php
session_start();
include_once '../m/productos.php';

if (isset($_SESSION['es_admin']) && $_SESSION['es_admin'] == true && isset($_POST['id_producto'])) {
    $id = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $desc = $_POST['descripcion'];
    $precio = $_POST['precio'];

    if (actualizarProducto($id, $nombre, $desc, $precio)) {
        header("Location: ../v/index.php?status=editado");
    } else {
        echo "Error al actualizar el producto.";
    }
} else {
    header("Location: ../v/index.php");
}
exit();