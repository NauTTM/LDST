<?php
    include("head.php");
    session_start();
    include("header.php");
?>

<body>
    
    <main>
        <?php
            include('conexBD.php');
            $palabra=$_POST['palabra'];
            $query="select * from camisetas where liga LIKE '%$palabra%' or equipo LIKE '%$palabra%' or equipacion LIKE '%$palabra%'";
            $resultado = mysqli_query($db, $query);
            $num=mysqli_num_rows($resultado);
            
            if ($num > 0) {
                echo "<h2>Resultados encontrados:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Liga</th><th>Equipo</th><th>Equipación</th><th>Año</th><th>Precio</th><th>Imagen</th></tr>";
    
                for ($i = 0; $i < $num; $i++) {
                    $fila = mysqli_fetch_array($resultado);
                    echo "<tr>";
                    echo "<td>" . $fila['liga'] . "</td>";
                    echo "<td>" . $fila['equipo'] . "</td>";
                    echo "<td>" . $fila['equipacion'] . "</td>";
                    echo "<td>" . $fila['ano'] . "</td>";
                    echo "<td>" . $fila['precio'] . " €</td>";
                    echo "<td><img src='./equipaciones/" . $fila['imagen'] . "' width='120' height='100'></td>";
                    echo '<td> <a href="anadirAlCarrito.php?liga=' . $fila['liga'] . '&equipo=' . $fila['equipo'] . '&id_camiseta=' . $fila['id_camiseta'] . '">
                            <button class="btn-carrito btn1">Añadir al carrito</button>
                        </a></td>';
                    echo "</tr>";
                }
    
                echo "</table>";
            } 
            else {
                echo "<h2>No se encontraron resultados para '$palabra'</h2>";
            }
        ?>
    </main>
   
    <?php
        include("aside.php");
    ?>

    <?php
        include("footer.php");
    ?>
    
    
</body>