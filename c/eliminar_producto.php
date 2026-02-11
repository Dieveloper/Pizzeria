<?php
session_start();
include_once '../m/productos.php';
include_once '../m/pedidos.php';

if (isset($_SESSION['es_admin']) && $_SESSION['es_admin'] == true && isset($_GET['id'], $_GET['imagen'])) {
    
    $id = $_GET['id'];
    $imagen_ruta_relativa = $_GET['imagen']; 
    
    $ruta_final_archivo = "../" . $imagen_ruta_relativa;



    borrarLinea($id);

    if (eliminarProducto($id)) {
        
        if (!empty($imagen_ruta_relativa) && file_exists($ruta_final_archivo)) {
            unlink($ruta_final_archivo);
        }
        
        header("Location: ../v/index.php?status=eliminado");
        exit();
    } else {
        echo "Error al eliminar el producto de la base de datos.";
    }

} else {

    header("Location: ../v/index.php");
    exit();
}