<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: iniciarSesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Dirección - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/nuevaDireccion.css">
</head>
<body>
    <div class="formulario-card">
        <h2>Nueva Dirección</h2>
        <p style="text-align:center; color:var(--verde);">Añade un lugar para recibir tus pedidos</p>

        <form action="../c/procesar_nueva_direccion.php" method="POST">
            <div class="campo">
                <label>Calle y Número</label>
                <input type="text" name="direccion" placeholder="Ej: Calle Mayor, 5" required>
            </div>
            <div class="campo">
                <label>Localidad</label>
                <input type="text" name="localidad" placeholder="Azuqueca de Henares" required>
            </div>
            <div class="campo">
                <label>Provincia</label>
                <input type="text" name="provincia" placeholder="Guadalajara" required>
            </div>
            <button type="submit" class="btn-guardar">Guardar Dirección</button>
        </form>
        <br>
        <div style="text-align:center;">
            <a href="perfil.php" style="color:var(--verde); text-decoration:none;">← Volver al listado</a>
        </div>
    </div>
</body>
</html>