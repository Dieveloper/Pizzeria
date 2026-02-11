<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }


    $_SESSION['carrito'][] = $id;


    header("Location: ../v/index.php?status=añadido");
    exit();
}
?>