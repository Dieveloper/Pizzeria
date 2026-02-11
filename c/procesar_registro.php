<?php
session_start();
include_once("../m/usuario.php");

if (isset($_POST["nombre"], $_POST["apellidos"], $_POST["email"],$_POST["telefono"],$_POST["password"])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $passCifrada=password_hash($password, PASSWORD_BCRYPT);
    if (existeUsuario($email)) {
        $_SESSION["fallo_registro"] = "EL EMAIL YA EXISTE PRUEBA A INICIAR SESION";
        header("Location: ../v/registrar.php");

    } else {
    $resultado = agregarUsuario($nombre, $apellidos, $email, $telefono, $passCifrada);
    if($resultado) {
        header("Location: ../v/iniciarSesion.php");
    }
}

}


?>