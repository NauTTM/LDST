<html>
    <head>
        <title>Conexion a la BD: Eliminar Camisetas (php)</title>
    </head>
    <body>
        <?php

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD.php');
            $id_camiseta=$_GET['id_camiseta'];
            // Verificar si el email ya existe en la base de datos
            $query = "DELETE FROM camisetas WHERE id_camiseta='" . $id_camiseta . "'";
            $result = mysqli_query($db, $query);
            header('location: mostrarCamisetas.php');  
        ?>

    </body>
</html>
