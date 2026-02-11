<?php
session_start();
include_once("../m/direcciones.php"); 
include_once("../m/pedidos.php"); 

if (!isset($_SESSION['id_usuario'])) {
    header("Location: iniciarSesion.php");
    exit();
}

$id_cliente = $_SESSION['id_usuario'];

$direcciones = obtenerDireccionesPorCliente($id_cliente); 

$pedidos = obtenerPedidosPorCliente($id_cliente); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/perfil.css">
    <style>
        .seccion-titulo { font-family: 'Cookie', cursive; font-size: 2.5rem; color: var(--rojo); margin-top: 30px; border-bottom: 2px dashed #ccc; }
        .tabla-pedidos { width: 100%; border-collapse: collapse; margin-top: 15px; background: rgba(255,255,255,0.3); }
        .tabla-pedidos th { text-align: left; border-bottom: 1px solid var(--rojo); padding: 8px; }
        .tabla-pedidos td { padding: 10px 8px; border-bottom: 1px solid #eee; font-size: 0.85rem; }
        .badge { background: var(--verde); color: white; padding: 2px 6px; border-radius: 3px; font-size: 0.7rem; }
    </style>
</head>
<body>
    <div class="carta-perfil" style="max-width: 850px;"> <h2>Panel de <?php echo $_SESSION['nombre']; ?></h2>
        
        <div class="seccion-titulo">📍 Mis Direcciones</div>
        <p>¿Dónde enviamos tu pedido?</p>

        <?php while($d = mysqli_fetch_assoc($direcciones)) { ?>
            <div class="dir-box">
                <div>
                    <strong><?php echo $d['direccion']; ?></strong><br>
                    <?php echo $d['localidad']; ?> (<?php echo $d['provincia']; ?>)
                </div>
                
                <form action="../c/seleccionar_direccion.php" method="POST" style="margin: 0;">
                    <input type="hidden" name="id_dir" value="<?php echo $d['id_direccion']; ?>">
                    <button type="submit" class="btn-post">Seleccionar</button>
                </form>
            </div>
        <?php } ?>
        <a href="nueva_direccion.php" class="add-link">+ Añadir Nueva Dirección</a>

        <div class="seccion-titulo">📜 Mi Historial</div>
        
        <?php if(mysqli_num_rows($pedidos) > 0) { ?>
            <table class="tabla-pedidos">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Entrega</th>
                        <th>Total</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($p = mysqli_fetch_assoc($pedidos)) { ?>
                        <tr>
                            <td>#<?php echo $p['id_pedido']; ?></td>
                            <td><span class="badge"><?php echo strtoupper($p['tipo_entrega']); ?></span></td>
                            <td><strong><?php echo $p['precio_total']; ?> €</strong></td>
                            <td><a href="../c/ver_detalle_pedido.php?id=<?php echo $p['id_pedido']; ?>" style="color:var(--rojo);">👁️ Ver</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p style="text-align:center; padding: 20px;">Aún no has hecho ningún pedido.</p>
        <?php } ?>

        <hr style="margin-top: 40px; border: 0; border-top: 1px solid #ccc;">
        <div style="text-align:center;">
            <a href="index.php" style="color:var(--verde); text-decoration:none;">← Volver a la Carta</a>
        </div>
    </div>
</body>
</html>