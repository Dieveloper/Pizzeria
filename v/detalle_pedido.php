<?php
session_start();
include_once("../m/pedidos.php");

if (!isset($_SESSION['id_usuario']) || !isset($_GET['id'])) {
    header("Location: perfil.php");
    exit();
}

$id_pedido = $_GET['id'];
$datos_pedido = obtenerPedidoPorId($id_pedido);
$lineas = obtenerLineasDetalle($id_pedido);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Comanda #<?php echo $id_pedido; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/perfil.css">
</head>
<body>
    <div class="carta-perfil">
        <h2>Comanda #<?php echo $id_pedido; ?></h2>
        <p style="text-align:center;">Fecha de pedido: <strong><?php echo $datos_pedido['fecha_hora']; ?></strong></p>

        <table class="tabla-pedidos">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Uni.</th>
                </tr>
            </thead>
            <tbody>
                <?php while($l = mysqli_fetch_assoc($lineas)) { ?>
                    <tr>
                        <td><?php echo $l['nombre']; ?></td>
                        <td><?php echo $l['cantidad']; ?></td>
                        <td><?php echo $l['precio_unitario']; ?> €</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div style="text-align: right; margin-top: 20px; font-size: 1.5rem;">
            <strong>TOTAL: <?php echo $datos_pedido['precio_total']; ?> €</strong>
        </div>

        <hr>
        <div style="text-align:center;">
            <a href="perfil.php" style="color:var(--verde); text-decoration:none;">← Volver a Mis Pedidos</a>
        </div>
    </div>
</body>
</html>