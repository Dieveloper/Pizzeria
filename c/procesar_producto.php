<?php
session_start();
include_once("../m/productos.php");


if(isset($_SESSION['es_admin']) && $_SESSION['es_admin'] == TRUE) {

    $id_cat = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $desc   = $_POST['descripcion'];
    $precio = $_POST['precio'];


    $nombreFoto = $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    
    $rutaDestino = "../i/" . $nombreFoto;

    
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        
        $rutaParaBD = "i/" . $nombreFoto;
        
        $resultado = crearProducto($id_cat, $nombre, $desc, $rutaParaBD, $precio);

        if($resultado) {
            
            header("Location: ../v/index.php?exito=1");
            exit();
        } else {
            echo "Error al insertar en la base de datos.";
        }
    } else {
        echo "Error: No se pudo subir la imagen. Revisa que la carpeta 'img' exista.";
    }

} else {

    header("Location: ../index.php");
    exit();
}
?>