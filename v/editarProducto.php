<?php
session_start();
include_once '../m/productos.php';

if (!isset($_SESSION['es_admin']) || $_SESSION['es_admin'] != true) {
    header("Location: index.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id_producto = $_GET['id'];
$p = obtenerProductoPorId($id_producto); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Plato - Hungrys Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/index.css"> <style>
        .form-editar {
            background-color: #f9f1dc;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border: 8px solid #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .form-editar input, .form-editar textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-family: 'Special Elite';
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        h2 { font-family: 'Cookie'; font-size: 3rem; color: #b02323; text-align: center; }
    </style>
</head>
<body>

<div class="form-editar">
    <h2>Editar Manjar</h2>
    <p style="text-align: center;">Modificando: <strong><?php echo $p['nombre']; ?></strong></p>

    <form action="../c/editar_producto.php" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $p['id_producto']; ?>">

        <label>Nombre del Plato:</label>
        <input type="text" name="nombre" value="<?php echo $p['nombre']; ?>" required>

        <label>Descripción:</label>
        <textarea name="descripcion" rows="4" required><?php echo $p['descripcion']; ?></textarea>

        <label>Precio (€):</label>
        <input type="number" name="precio" step="0.01" value="<?php echo $p['precio_unitario']; ?>" required>

        <button type="submit" class="btn-ordenar" style="width: 100%; border: none; cursor: pointer;">
            Guardar Cambios
        </button>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" style="color: #2e5a1c; text-decoration: none;">← Cancelar y volver</a>
    </div>
</div>

</body>
</html>