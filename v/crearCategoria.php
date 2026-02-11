<?php
    session_start();
    if(isset($_SESSION['es_admin']) && $_SESSION['es_admin'] == TRUE){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - La Cocina de Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/crearCategoria.css">
</head>
<body>
    <div class="admin-card">
        <h2>Secciones</h2>
        <p class="subtitle">Organiza los grupos de tu cocina</p>
        
        <form action="../c/procesar_categoria.php" method="POST">
            <label for="nombreCategoria">Nombre de la Categoría</label>
            <input type="text" id="nombreCategoria" name="nombreCategoria" placeholder="Pizzas, Pasta, Postres..." required>
            <button type="submit">¡Añadir al Listado!</button>
        </form>

        <div class="nav-footer">
            <a href="crearProducto.php" class="link-item featured-link">
                🍕 Gestionar los Platos
            </a>
            <a href="index.php" class="link-item">
                ← Volver a la mesa principal
            </a>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        header("Location: index.php");
        exit();
    }
?>