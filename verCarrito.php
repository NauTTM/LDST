<?php
    session_start();
    include("head.php");
    include("headerCarro.php");
?>

<body>
    <?php include("aside.php"); ?>

    <main>
        <h1>TU CARRITO</h1>

        <?php

            // Verificar si el carrito está vacío
            if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
                echo '<img src="./iconos/carritoVacio.png" alt="Carrito vacío" class="imagen-carrito">';
                echo '<p>EL CARRITO ESTA VACÍO</p>';
            }
            else {
                // Mostrar los productos del carrito
                echo "<table border='0' cellspacing='0' cellpadding='15'>";

                $total = 0; // Variable para almacenar el total del carrito

                foreach ($_SESSION['carrito'] as $index => $producto) {
                    echo "<tr>";    
                    echo "<td><img src='equipaciones/{$producto['imagen']}' width='80' height='80'></td>";                
                    echo "<td>{$producto['cantidad']}</td>";
                    $precioTotalProducto = $producto['precio'] * $producto['cantidad'];
                    echo "<td>{$precioTotalProducto}€</td>";  
                    
                    echo "<td>
                            <form action='eliminarProducto.php' method='POST'>
                                <input type='hidden' name='index' value='{$index}'>
                                <button type='submit'>Eliminar</button>
                            </form>
                          </td>";
                    echo "</tr>";

                    $total += $producto['precio'] * $producto['cantidad'];
                }

                echo "</table>";

                // Mostrar el total
                echo "<h3>Total del carrito: {$total}€</h3>";

                echo "<form action='tramitarCarrito.php' method='POST'>";
                echo "<button type='submit'>Tramitar carrito</button>";
                echo "</form>";
            }
        ?>
    </main>

    <?php include("footer.php"); ?>
</body>
</html>