
<?php
    include("head.php");
    session_start();
    include("header.php");
    if ($_SESSION['privilegio'] !== 'A') {
        header("Location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>Conexion a la BD: Mostrar Clientes (php)</title>
    </head>
    <body>
        <main> 
            <?php
                include('ConexBD.php');

                // Consultar los usuarios
                $query = "SELECT * FROM usuarios";
                $result = mysqli_query($db, $query);

                $num = mysqli_num_rows($result);
                if($num != 0){
                    echo "<form method='post' action='actualizarPrivilegio.php'>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>Email</td><td>Nombre</td><td>Apellidos</td><td>Fecha</td><td>Privilegio</td><td>Eliminar</td><td>Modificar</td>";
                    echo "</tr>";
        
                    for($i = 0; $i < $num; $i++){
                        $fila = mysqli_fetch_array($result);
                        echo "<tr>";
                        echo "<td>" . $fila['email'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['apellidos'] . "</td>";
                        echo "<td>" . $fila['fecha'] . "</td>";
                        echo "<td>" . $fila['privilegio'] . "</td>";
                        //echo "<td><input type='radio' name='privilegio[" . $fila['email'] . "]' value='A' " . ($fila['privilegio'] == 'A' ? "checked" : "") . "> A ";
                        //echo "<input type='radio' name='privilegio[" . $fila['email'] . "]' value='C' " . ($fila['privilegio'] == 'C' ? "checked" : "") . "> C</td>";
                        echo "<td><a href='eliminarUsuario.php?email=" . $fila['email'] . "'>Eliminar</a></td>";
                        echo "<td><a href='modificarUsuario.php?email=" . $fila['email'] . "'>Modificar</a></td>";
                        echo "</tr>";
                    }
        
                    echo "</table>";
                    echo "<button type='submit'>Guardar Cambios</button>";
                    echo "</form>";
                } else {
                    echo "El número de usuarios encontrados es: " . $num;
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
</html>
