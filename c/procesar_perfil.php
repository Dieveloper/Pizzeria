<?php
session_start();
include_once("../m/direcciones.php");

if (isset($_SESSION['id_usuario'])) {
    

    $id_cliente = $_SESSION['id_usuario']; 
    $dir = $_POST['direccion'];
    $loc = $_POST['localidad'];
    $prov = $_POST['provincia'];


    $id_nueva_direccion = crearDireccion($id_cliente, $dir, $loc, $prov);

    if ($id_nueva_direccion) {
        

        $resultado = establecerDireccionPredeterminada($id_cliente, $id_nueva_direccion);

        if ($resultado) {
            
            header("Location: ../v/index.php?perfil=guardado");
            exit();
        } else {
            echo "Error al vincular la dirección con el cliente.";
        }

    } else {
        echo "Error al crear la dirección física.";
    }

} else {
    
    header("Location: ../v/iniciarSesion.php");
    exit();
}
?>