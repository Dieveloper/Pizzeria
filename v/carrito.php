<?php
session_start();
include_once '../m/bd.php';
include_once '../m/productos.php';

$total_comanda = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Pedido - Hungrys</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/carrito.css">
</head>
<body>
    <div class="ticket">
        <h2>Tu Comanda</h2>
        
        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Plato</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['carrito'] as $id_producto) {
                        $producto = obtenerProductoPorId($id_producto);
                        $total_comanda = $total_comanda + $producto['precio_unitario'];
                        ?>
                        <tr>
                            <td>1x <?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['precio_unitario']; ?> €</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="total">TOTAL: <?php echo $total_comanda; ?> €</div>

            <?php if (isset($_SESSION['id_usuario'])) { ?>
                <form action="../c/finalizar_pedido.php" method="POST" style="margin-top: 30px; border-top: 2px dashed var(--rojo); padding-top: 20px;">
                    <p style="text-align: center; font-weight: bold; color: var(--verde-italia);">¿Cómo prefieres disfrutarlo?</p>
                    
                    <div style="display: flex; justify-content: space-around; margin-bottom: 25px;">
                        <label style="cursor: pointer;">
                            <input type="radio" name="tipo_entrega" value="reparto" checked> 🛵 Reparto
                        </label>
                        <label style="cursor: pointer;">
                            <input type="radio" name="tipo_entrega" value="recogida"> 🏪 En local
                        </label>
                    </div>

                    <button type="submit" class="btn-confirmar" style="border: none; width: 100%; cursor: pointer; display: block;">
                        ¡Confirmar y Pagar!
                    </button>
                </form>
            <?php } else { ?>
                <a href="registrar.php" class="btn-confirmar">¡Regístrate para comer!</a>
            <?php } ?>  

        <?php } else { ?>
            <p style="text-align:center;">El carrito está vacío. ¡Pide algo rico!</p>
        <?php } ?>

        <div style="text-align:center; margin-top: 20px;">
            <a href="index.php" style="color:var(--verde); text-decoration:none;">← Seguir comprando</a>
        </div>
    </div>
</body>
</html>