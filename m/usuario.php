<?php
function existeUsuario($email) {
    include_once("bd.php");
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");

    $consulta = "SELECT id_cliente FROM CLIENTES WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $consulta);
    
    return (mysqli_num_rows($resultado) > 0);
}

function agregarUsuario($nombre, $apellidos, $email, $telefono, $pass_cifrada) {
    include_once("bd.php");
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");

    $consulta = "INSERT INTO CLIENTES (nombre, apellidos, email, telefono, password) 
                 VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$pass_cifrada')";
    $resultado = mysqli_query($conexion, $consulta);
    
    return $resultado;
}

function iniciarSesion($email, $pass) {
    include_once("bd.php");
    $conexion = conectar();
    mysqli_query($conexion, "USE hungrys");

    $consulta = "SELECT id_cliente, password, es_admin, nombre FROM CLIENTES WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_assoc($resultado);

    if(password_verify($pass, $fila['password'])){
        return $fila; 
    }
    return false;
}

function obtenerTodosLosUsuarios() {
    include_once("bd.php");
    $conexion = conectar();
    $consulta = "SELECT  nombre, email FROM CLIENTES ";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}


?>