<?php
session_start();
include_once '../m/categorias.php';
include_once '../m/productos.php';


$cat = $_GET['cat'] ?? 'todas';
$productos = ($cat == 'todas') ? obtenerProductos() : obtenerProductosPorCategoria($cat);


$categorias = obtenerCategorias();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Carta - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/index.css">
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="logo">Hungrys</a>
        <div class="user-nav">
            <?php if (!isset($_SESSION['id_usuario'])) { ?>
                <a href="carrito.php" class="btn-carrito">🛒 (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</a>
                <a href="iniciarSesion.php">Entrar</a>
                <a href="registrar.php">Registrar</a>
            <?php } else { ?>
                <span>Bienvenido, <?php echo  $_SESSION["nombre"];   ?></span>
                            <?php if (isset($_SESSION['es_admin']) && $_SESSION['es_admin']) { ?>
                <a href="panelControl.php">Panel Admin</a> <span></span>
            <?php } ?>
                <a href="carrito.php" class="btn-carrito">🛒 (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</a>
                <a href="perfil.php">Mi Perfil</a>
                <a href="../c/cerrar_sesion.php" style="color:red">Salir</a>
            <?php } ?>


        </div>
    </nav>

    <div class="carta-papel">
        <h1>Menú del Día</h1>

        <div class="filtros-categorias">
            <a href="index.php?cat=todas" class="btn-filtro <?php echo ($cat == 'todas') ? 'activo' : ''; ?>">Todas</a>
            <?php while ($c = mysqli_fetch_assoc($categorias)) { ?>
                <a href="index.php?cat=<?php echo $c['id_categoria']; ?>" 
                   class="btn-filtro <?php echo ($cat == $c['id_categoria']) ? 'activo' : ''; ?>">
                    <?php echo $c['nombre']; ?>
                </a>
            <?php } ?>
        </div>

        <div class="grid-productos">
            <?php while ($p = mysqli_fetch_assoc($productos)) { ?>
                <div class="card-plato">
                    <img src="../<?php echo $p['imagen']; ?>" class="foto-plato">
                    <div class="nombre-plato"><?php echo $p['nombre']; ?></div> 
                    <div class="precio-plato"><?php echo $p['precio_unitario']; ?> €</div>
                    
                    <a href="../c/agregar_carrito.php?id=<?php echo $p['id_producto']; ?>" class="btn-ordenar">Añadir</a> 
                    
                    <?php if (isset($_SESSION['es_admin']) && $_SESSION['es_admin']) { ?>
                        <div style="margin-top:10px;">
                            <a href="editarProducto.php?id=<?php echo $p['id_producto']; ?>" style="text-decoration:none">📝</a>
                            <a href="../c/eliminar_producto.php?id=<?php echo $p['id_producto']; ?>&imagen=<?php echo $p['imagen']; ?>" onclick="return confirm('¿Borrar?')" style="text-decoration:none">🗑️</a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>