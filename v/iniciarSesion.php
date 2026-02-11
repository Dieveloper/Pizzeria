<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entra a la Cocina - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/iniciarSesion.css">
</head>
<body>

<div class="registro-container">
    <div class="header-registro">
        <h2>HUNGRYS</h2>
        <p>¡Entra a la cocina, Diego!</p>
    </div>
    
    <form action="../c/procesar_inicioSesion.php" method="POST">
        <?php if(isset($_SESSION["error_inicioi_sesion"])){echo $_SESSION["error_inicioi_sesion"]; unset($_SESSION["error_inicioi_sesion"]);} ?>
        <div class="campo">
            <label>Correo Electrónico</label>
            <input type="email" name="email" placeholder="diego@ejemplo.com" required>
        </div>
        <div class="campo">
            <label>Tu Contraseña Secreta</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit">¡Buen provecho!</button>
    </form>

    <div class="footer-link">
        ¿Aún no tienes mesa? <a href="registrar.php">¡Regístrate aquí!</a>
    </div>
</div>

</body>
</html>