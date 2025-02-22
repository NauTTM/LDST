<?php
    session_start();
    include("head.php");
    include("header.php");
    if ($_SESSION['privilegio'] !== 'A') {
        header("Location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>Conexion a la BD: Mostrar Camisetas(php)</title>
    </head>
    <body>
        <main> 
            <?php
                //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
                //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
                include('ConexBD.php');
                

                // Mostrar el tabla  de camisetas
                $query = "SELECT * FROM camisetas";
                $result = mysqli_query($db, $query);

                $num=mysqli_num_rows($result);
                
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>id</td><td>Liga</td><td>Equipo</td><td>Equipacion</td><td>Año</td><td>Precio</td><td>Eliminar</td><td>Modificar</td>";
                echo "</tr>";

                for($i=0;$i<$num;$i++){
                    $fila=mysqli_fetch_array($result);   
                    echo "<tr>";
                    echo "<td>" . $fila['id_camiseta'] . "</td>";
                    echo "<td>" . $fila['liga'] . "</td>";
                    echo "<td>" . $fila['equipo'] . "</td>";
                    echo "<td>" . $fila['equipacion'] . "</td>";
                    echo "<td>" . $fila['ano'] . "</td>";
                    echo "<td>" . $fila['precio'] . "</td>";
                    echo "<td><a href='eliminarCamiseta.php?id_camiseta=" . $fila['id_camiseta'] . "'>Eliminar</a></td>";
                    echo "<td><a href='modificarCamiseta.php?id_camiseta=" . $fila['id_camiseta'] . "'>Modificar</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            
            ?>
        </main>

        <?php
            include("aside.php");
        ?>

        <?php
            include("footer.php");
        ?>

    </body>
</html>
