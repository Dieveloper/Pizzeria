<?php
    include("m/bd.php");

    $conexion = conectarI();

    if(!$conexion){
        echo "No se pudo conectar";
    }else{
        
        $consulta = "CREATE DATABASE IF NOT EXISTS hungrys";
        $resultado = mysqli_query($conexion, $consulta);
        $consulta = "USE hungrys";
        $resultado = mysqli_query($conexion, $consulta);


        $consulta = "CREATE TABLE IF NOT EXISTS CATEGORIAS (
        id_categoria INT PRIMARY KEY AUTO_INCREMENT, 
        nombre VARCHAR(100) NOT NULL UNIQUE
        );";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta = "CREATE TABLE IF NOT EXISTS PRODUCTOS (
        id_producto INT PRIMARY KEY AUTO_INCREMENT, 
        id_categoria INT,
        nombre VARCHAR(100) NOT NULL,
        descripcion VARCHAR(255) NOT NULL,
        imagen VARCHAR(255) NOT NULL,
        precio_unitario DECIMAL(10,2) NOT NULL,
        FOREIGN KEY (id_categoria) REFERENCES CATEGORIAS(id_categoria) ON DELETE RESTRICT
        );";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta = "CREATE TABLE IF NOT EXISTS CLIENTES (
        id_cliente INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE NOT NULL,
        telefono VARCHAR(20),
        password VARCHAR(255) NOT NULL,
        es_admin BOOLEAN DEFAULT FALSE,
        id_direccion_predeterminada INT
        );";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta = "CREATE TABLE IF NOT EXISTS DIRECCIONES (
        id_direccion INT PRIMARY KEY AUTO_INCREMENT,
        id_cliente INT,
        direccion VARCHAR(255) NOT NULL,
        localidad VARCHAR(100),
        provincia VARCHAR(100),
        FOREIGN KEY (id_cliente) REFERENCES CLIENTES(id_cliente) ON DELETE CASCADE
        );";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta = "ALTER TABLE CLIENTES ADD FOREIGN KEY (id_direccion_predeterminada) REFERENCES DIRECCIONES(id_direccion) ON DELETE SET NULL;";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta = "CREATE TABLE IF NOT EXISTS PEDIDOS (
        id_pedido INT PRIMARY KEY AUTO_INCREMENT,
        id_cliente INT,
        fecha_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
        tipo_entrega ENUM('reparto', 'recogida') NOT NULL,
        precio_total DECIMAL(10,2) NOT NULL,
        FOREIGN KEY (id_cliente) REFERENCES CLIENTES(id_cliente) ON DELETE SET NULL
        );";
        $resultado = mysqli_query($conexion, $consulta);

        $consulta = "CREATE TABLE IF NOT EXISTS LINEAS_PEDIDO (
        id_pedido INT,
        id_producto INT,
        cantidad INT NOT NULL,
        PRIMARY KEY (id_pedido, id_producto),
        FOREIGN KEY (id_pedido) REFERENCES PEDIDOS(id_pedido) ON DELETE CASCADE,
        FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id_producto) ON DELETE RESTRICT
        );";
        $resultado = mysqli_query($conexion, $consulta);

        $pass = 1234;
        $passC = password_hash($pass, PASSWORD_BCRYPT);
        $checkAdmin = mysqli_query($conexion, "SELECT id_cliente FROM CLIENTES WHERE email = 'admin@gmail.com'");
        
        if(mysqli_num_rows($checkAdmin) == 0) {
            $consulta = "INSERT INTO CLIENTES (nombre, apellidos, email, telefono, password, es_admin) 
                 VALUES ('admin', 'admin', 'admin@gmail.com', '123456789', '$passC', TRUE)";
            $resultado = mysqli_query($conexion, $consulta);
        }

        echo "Base de datos configurada con éxito.";
    }
?>