<?php
    session_start();
    include_once("../m/categorias.php"); 
    include_once("../m/productos.php");

    if (!isset($_SESSION['es_admin']) || $_SESSION['es_admin'] != TRUE) {
        header("Location: index.php");
        exit();
    }

    $categorias = obtenerCategorias();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/crearProducto.css">
</head>
<body>

<div class="admin-card">
    <h2>El Menú</h2>
    <p class="subtitle">Añade una nueva especialidad de la casa</p>
    
    <form action="../c/procesar_producto.php" method="POST" enctype="multipart/form-data">
        
        <div class="campo">
            <label>Selecciona la Categoría</label>
            <select name="id_categoria" required>
                <option value="">-- Elige un grupo --</option>
                <?php while($cat = mysqli_fetch_assoc($categorias)) { ?>
                    <option value="<?php echo $cat['id_categoria']; ?>">
                        <?php echo $cat['nombre']; ?>
                    </option>
                <?php } ?>
            </select>   
        </div>

        <div class="campo">
            <label>Nombre del Plato</label>
            <input type="text" name="nombre" placeholder="Ej: Pizza de la Mamma" required>
        </div>

        <div class="campo">
            <label>Descripción de los Ingredientes</label>
            <textarea name="descripcion" rows="2" placeholder="Harina de fuerza, tomate natural..." required></textarea>
        </div>

        <div class="campo">
            <label>Precio de Venta (€)</label>
            <input type="number" name="precio" step="0.01" placeholder="10.50" required>
        </div>

        <div class="campo">
            <label>Foto de la Delicia</label>
            <input type="file" name="imagen" accept="image/*" required>
        </div>

        <button type="submit">¡A los Fogones!</button>
    </form>

    <div class="nav-footer">
        <a href="index.php" class="link-item">← Volver a la Carta Principal</a>
    </div>
</div>

</body>
</html>