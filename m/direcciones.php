<?php
    include_once("bd.php");

  
    function crearDireccion($id_cliente, $direccionB, $localidad, $provincia){
        $conexion = conectar();
        mysqli_query($conexion, "USE hungrys");

        $consulta = "INSERT INTO DIRECCIONES (id_cliente, direccion, localidad, provincia)
                     VALUES('$id_cliente', '$direccionB', '$localidad', '$provincia')";
        
        $resultado = mysqli_query($conexion, $consulta);

        if($resultado){

            return mysqli_insert_id($conexion);
        } else {
            return false;
        }
    }


    function obtenerDireccionesPorCliente($id_cliente){
        $conexion = conectar();
        mysqli_query($conexion, "USE hungrys");

        $consulta = "SELECT * FROM DIRECCIONES WHERE id_cliente = '$id_cliente'";
        $resultado = mysqli_query($conexion, $consulta);
        
        return $resultado;
    }


    function establecerDireccionPredeterminada($id_cliente, $id_direccion){
        $conexion = conectar();
        mysqli_query($conexion, "USE hungrys");
        

        $consulta = "UPDATE CLIENTES 
                     SET id_direccion_predeterminada = '$id_direccion' 
                     WHERE id_cliente = '$id_cliente'";
        
        return mysqli_query($conexion, $consulta);
    }


    function obtenerDireccionPredeterminada($id_cliente){
        $conexion = conectar();
        mysqli_query($conexion, "USE hungrys");


        $consulta = "SELECT D.* FROM DIRECCIONES D
                     INNER JOIN CLIENTES C ON D.id_direccion = C.id_direccion_predeterminada
                     WHERE C.id_cliente = '$id_cliente'";
        
        $resultado = mysqli_query($conexion, $consulta);
        return mysqli_fetch_assoc($resultado);
    }
?>