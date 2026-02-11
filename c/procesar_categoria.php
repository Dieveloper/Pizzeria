<?php
    session_start();
    include_once("../m/categorias.php");
    if(isset($_POST['nombreCategoria'])){
        crearCategorias($_POST['nombreCategoria']);
        header("Location: ../v/crearCategoria.php");

    }


?>