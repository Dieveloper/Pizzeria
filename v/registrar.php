<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - La Familia Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/registrar.css">
</head>
<body>

<div class="registro-container">
    <div class="header-registro">
        <h2>HUNGRYS</h2>
        <p>¡Reserva tu sitio en la familia!</p>
    </div>
    
    <form action="../c/procesar_registro.php" method="POST">
        <?php if(isset($_SESSION["fallo_registro"])){echo $_SESSION["fallo_registro"]; unset($_SESSION["fallo_registro"]);} ?>
        <div class="fila">
            <div class="campo">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Diego" required>
            </div>
            <div class="campo">
                <label>Apellidos</label>
                <input type="text" name="apellidos" placeholder="Gomez Jordan" required>
            </div>
        </div>

        <div class="campo">
            <label>Correo Electrónico</label>
            <input type="email" name="email" placeholder="diego@ejemplo.com" required>
        </div>

        <div class="campo">
            <label>Teléfono de Contacto</label>
            <input type="tel" name="telefono" placeholder="600 000 000">
        </div>

        <div class="campo">
            <label>Elige una Contraseña</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit">¡Regístrate!</button>
    </form>

    <div class="footer-link">
        ¿Ya eres de la familia? <a href="iniciarSesion.php">Inicia sesión</a>
    </div>
</div>

</body>
</html>