<?php
session_start();

if (!isset($_SESSION['es_admin']) || $_SESSION['es_admin'] != true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Hungrys - Diego's Office</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/admin.css">
</head>
<body>

<div class="dashboard-container">
    <div class="admin-header">
        <h1>Oficina del Chef</h1>
        <p>Gestiona el imperio Hungrys, Diego</p>
    </div>

    <div class="grid-admin">
        <a href="crearProducto.php" class="card-admin">
            <span class="icon-admin">🍕</span>
            <h3>Productos</h3>
            <p>Añade nuevas especialidades o edita las existentes en la carta.</p>
        </a>

        <a href="crearCategoria.php" class="card-admin">
            <span class="icon-admin">📁</span>
            <h3>Categorías</h3>
            <p>Organiza el menú: Pizzas, Pastas, Entrantes.</p>
        </a>

        <a href="listaUsuarios.php" class="card-admin">
            <span class="icon-admin">👥</span>
            <h3>La Familia</h3>
            <p>Consulta quiénes son tus clientes y gestiona sus permisos.</p>
        </a>
    </div>

    <div style="text-align: center; margin-top: 50px;">
        <a href="index.php" style="color: var(--verde); text-decoration: none; font-weight: bold;">← Volver a la Carta</a>
    </div>
</div>

</body>
</html>