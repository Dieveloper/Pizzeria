<?php
session_start();
include_once("../m/direcciones.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id_usuario'])) {
    
    $id_cliente = $_SESSION['id_usuario'];
    $direccion  = $_POST['direccion'];
    $localidad  = $_POST['localidad'];
    $provincia  = $_POST['provincia'];


    $id_nueva = crearDireccion($id_cliente, $direccion, $localidad, $provincia);

    if ($id_nueva) {

        header("Location: ../v/perfil.php?status=nueva_ok");
        exit();
    } else {
        echo "Error al guardar la nueva dirección.";
    }
} else {
    header("Location: ../v/iniciarSesion.php");
    exit();
}
?>