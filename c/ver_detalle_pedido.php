<?php
session_start();
include_once("../m/pedidos.php");


if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../v/iniciarSesion.php");
    exit();
}


if (isset($_GET['id'])) {
    $id_pedido = $_GET['id'];
    
    header("Location: ../v/detalle_pedido.php?id=$id_pedido");
    exit();
} else {
    header("Location: ../v/perfil.php");
    exit();
}