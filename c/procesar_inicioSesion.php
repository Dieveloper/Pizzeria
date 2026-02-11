<?php
session_start();
include_once("../m/usuario.php");


if (isset($_POST["email"], $_POST["password"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (existeUsuario($email)) {

        $usuario = iniciarSesion($email, $password);

        if ($usuario) {
            $_SESSION['id_usuario'] = $usuario['id_cliente'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['es_admin'] = $usuario['es_admin'];
            header("Location: ../v/index.php");
        } else {
            echo "La contraseña no coincide.";
        }

    } else {
        $_SESSION["error_inicioi_sesion"] = "EL EMAIL O LA CONTRASEÑA NO SON CORRECTOS";
        header("Location: ../v/iniciarSesion.php");
    }
}
?>