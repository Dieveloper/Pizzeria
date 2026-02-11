<?php
session_start();
include_once '../m/usuario.php'; 

if (!isset($_SESSION['es_admin']) || $_SESSION['es_admin'] != true) {
    header("Location: index.php");
    exit();
}

$usuarios = obtenerTodosLosUsuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/lista_usuarios.css"> 
</head>
<body>

<div class="dashboard-container">
    <div class="admin-header">
        <h1>La Familia Hungrys</h1>
        <p>Control de acceso y clientes registrados</p>
    </div>

    <table class="tabla-usuarios">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while($u = mysqli_fetch_assoc($usuarios)) { ?>
                <tr>
                    <td><?php echo $u['nombre']; ?></td>
                    <td><?php echo $u['email']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="panelControl.php" class="btn-volver">← Volver al Panel</a>
    </div>
</div>

</body>
</html>