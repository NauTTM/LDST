<?php
    session_start();
    include('conexBD.php');

    // Verificar si el carrito existe y no está vacío
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        $emailUsuario = $_SESSION['email']; // Suponiendo que el email está almacenado en la sesión
        $total = 0;

        // Calcular el total del carrito
        foreach ($_SESSION['carrito'] as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        // Insertar en la tabla pedidos
        $fechaHora = date('Y-m-d H:i:s');
        $queryPedido = "INSERT INTO pedidos (email, coste_total, fecha_hora) VALUES ('$emailUsuario', $total, '$fechaHora')";
        mysqli_query($db, $queryPedido);

        // Obtener el ID del pedido recién insertado
        $idPedido = mysqli_insert_id($db);

        // Insertar los productos en la tabla pedido_camisetas
        foreach ($_SESSION['carrito'] as $producto) {
            $idCamiseta = $producto['id_camiseta'];
            $cantidad = $producto['cantidad'];
            $queryPedidoCamisetas = "INSERT INTO pedido_camisetas (id_pedido, id_camiseta, cantidad) VALUES ($idPedido, $idCamiseta, $cantidad)";
            mysqli_query($db, $queryPedidoCamisetas);
        }

        // Vaciar el carrito
        unset($_SESSION['carrito']);

        // Redirigir al usuario a una página de confirmación
        echo "<script>alert('Compra realizada con éxito.');window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "El carrito está vacío. No se puede tramitar.";
    }
?>