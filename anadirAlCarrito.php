<?php
    session_start();    
    include("head.php");
    include("headerCarro.php");

 ?>
   <?php
        include("aside.php");
    ?>

    <?php
        include("footer.php");
    ?>
 
 <body>
    <main>
        
    <?php
        include('ConexBD.php'); // Conexión a la base de datos


        @$liga = $_GET['liga'];
        @$equipo = $_GET['equipo'];
        @$id_camiseta = $_GET['id_camiseta'];

    
        if (!empty($id_camiseta) && !empty($liga) && !empty($equipo)) {
            $query = "SELECT * FROM camisetas WHERE id_camiseta = $id_camiseta";
            $resultado = mysqli_query($db, $query);
            
            if ($fila = mysqli_fetch_assoc($resultado)) {
                // Crear un array con los datos de la camiseta
                $camiseta = array(
                    'id_camiseta' => $fila['id_camiseta'],
                    'imagen' => $fila['imagen'],
                    'precio' => $fila['precio'],
                    'cantidad' => 1
                );

                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = array(); 
                }
    
                // Verificar si el producto ya está en el carrito
                $producto_existe = false;
                foreach ($_SESSION['carrito'] as $index => $producto) {
                    if ($producto['id_camiseta'] == $camiseta['id_camiseta']) {
                        // Si el producto ya existe, incrementar la cantidad
                        $_SESSION['carrito'][$index]['cantidad'] += 1;
                        $producto_existe = true;
                        break;
                    }
                }
    
                // Si el producto no existe en el carrito, agregarlo con cantidad 1
                if (!$producto_existe) {
                    $_SESSION['carrito'][] = $camiseta;
                }
        
                echo "<script>alert('Producto añadido al carrito correctamente.');history.back();</script>";
                exit;
            }
        } 
    
?>
    </main>

</body>