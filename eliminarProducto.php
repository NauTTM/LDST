<?php
    session_start();

    if (isset($_POST['index'])) {
        $index = $_POST['index'];

        if ($_SESSION['carrito'][$index]['cantidad'] > 1) {
            // Si la cantidad es mayor que 1, solo decrementa
            $_SESSION['carrito'][$index]['cantidad'] -= 1;
        } else {
            // Si la cantidad es 1, elimina el producto
            unset($_SESSION['carrito'][$index]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']); 
        }
    }

    header('Location: verCarrito.php');
    exit;
?>