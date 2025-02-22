<html>
    <head>
        <title>Conexion a la BD: Registro de camisetas (php)</title>
    </head>
    <body>
        <?php

            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
            $liga=$_POST['liga']; 
            $equipo=$_POST['equipo'];
            $equipacion=$_POST['equipacion'];
            $ano=$_POST['temporada'];
            $precio=$_POST['precio'];
            

            //Recortamos caracteres en blanco al principio y final de la cadena con trim
            $liga = trim($liga);
            $equipo = trim($equipo);
            $equipacion = trim($equipacion);
            $ano = trim($ano);
            $precio = trim($precio);
            
            

            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if (!$liga || !$equipo || !$equipacion || !$ano || !$precio)
            {
                echo 'No ha introducido toda la informaci&oacute;n requerida para el cliente.<br>'
                .'Por favor, vuelva a la p&aacute;gina anterior e int&eacute;ntelo de nuevo.';
                exit;
            }

            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
            
            $liga = addslashes($liga);
            $equipo = addslashes($equipo);
            $equipacion = addslashes($equipacion);
            $ano = addslashes($ano);
            $precio = addslashes($precio);
            

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD.php');
                       
            //Definimos una cadena con la consulta que queremos hacer. Es recomendable sacar las variables de las comillas. Cuidado con el juego de comillas, es donde se suelen producir los errores.
            $query = "insert into camisetas values 
            ('NULL','" . $liga . "', '" . $equipo . "', '" . $equipacion . "', '" . $ano . "', '" . $precio ."',' ')";
            echo $query;

            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            // echo "<br>" . $query . "<br>";
            
            //Enviamos la consulta para su ejecución en la BD con mysqli_query
            $resultado = mysqli_query($db, $query);

            //En las consultas de inserción, modificación o borrado, sólo se informa de si se ha hecho correctamente o no, no hay datos que volcar, por lo que son más fáciles.
            //La función mysqli_affected_rows devuelve el número de registros que se han visto afectados con la operación.
            //Si siempre va a ser 1 como en este caso, no sería necesario/conveniente utilizarla y con decir que se ha llevado a cabo correctamente la operación valdría.
            //Si quisiéramos mostrarle los datos insertados, o tomamos los que envió el usuario (que pueden no haberse insertado tal cual) o hacemos una selección para mostrárselos
            if ($resultado){
                echo "<script>alert('Camiseta añadida correctamente');</script>";
                echo "<script>window.location.href = 'mostrarCamisetas.php';</script>";
            }
            else{
             echo "Se ha producido un error y no se ha podido llevar a cabo la operaci&oacute;n.";
            }
            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);

        ?>

    </body>
</html>