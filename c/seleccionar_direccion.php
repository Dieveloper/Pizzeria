<?php
session_start();
include_once("../m/direcciones.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id_usuario'])) {
    
    $id_cliente = $_SESSION['id_usuario'];
    $id_dir = $_POST['id_dir'];

    $res = establecerDireccionPredeterminada($id_cliente, $id_dir);

    if ($res) {
        header("Location: ../v/perfil.php?status=cambiado");
        exit();
    } else {
        echo "Error al actualizar la dirección favorita.";
    }
} else {

    header("Location: ../v/iniciarSesion.php");
    exit();
}
?>