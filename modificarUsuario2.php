<html
    <head>
    <?php
        session_start();
    ?>
    </head>
    <body>
        <?php
            $email=$_GET['email'];
            if (!$email) {
                echo "<script>alert('No se ha recibido el email del usuario a modificar');history.back();</script>";
                exit;
            }
            
            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
            //$id_camiseta=$_POST['id_camiseta'];
            $nombre=$_POST['nombre']; 
            $apellidos=$_POST['apellidos'];
            $fecha=$_POST['fecha'];
            $password=$_POST['password'];
            $confirmar_password=$_POST['confirmar_password'];
            $privilegio=$_POST['privilegio'];
            

            //Recortamos caracteres en blanco al principio y final de la cadena con trim
           // $id_camiseta = trim($id_camiseta);
            $nombre = trim($nombre);
            $apellidos = trim($apellidos);
            $fecha = trim($fecha);
            $password = trim($password);
            $confirmar_password = trim($confirmar_password);
            $privilegio = trim($privilegio);
            
            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if (!$nombre || !$apellidos || !$fecha || !$password || !$confirmar_password)
            {
                echo "<script>alert('No se han introducido todos los campos necesarios');history.back();</script>";
                exit;
            } 

            if ($password !== $confirmar_password) {
                echo "<script>alert('Las contraseñas no coinciden');history.back();</script>";
                exit;
            }

            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
           // $id_camiseta = addslashes($id_camiseta);
            $nombre = addslashes($nombre);
            $apellidos = addslashes($apellidos);
            $fecha = addslashes($fecha);
            $password = addslashes($password);
            $confirmar_password = addslashes($confirmar_password);
            

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD.php');
                       
            //Definimos una cadena con la consulta que queremos hacer. Es recomendable sacar las variables de las comillas. Cuidado con el juego de comillas, es donde se suelen producir los errores.
            $query = "UPDATE usuarios
                    SET password = '".$password."', nombre = '".$nombre."', apellidos = '".$apellidos."', fecha = '".$fecha."', privilegio = '".$privilegio."'
                    WHERE  email = '".$email."'";

            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            // echo "<br>" . $query . "<br>";
            
            //Enviamos la consulta para su ejecución en la BD con mysqli_query
            $resultado = mysqli_query($db, $query);

            //En las consultas de inserción, modificación o borrado, sólo se informa de si se ha hecho correctamente o no, no hay datos que volcar, por lo que son más fáciles.
            //La función mysqli_affected_rows devuelve el número de registros que se han visto afectados con la operación.
            //Si siempre va a ser 1 como en este caso, no sería necesario/conveniente utilizarla y con decir que se ha llevado a cabo correctamente la operación valdría.
            //Si quisiéramos mostrarle los datos insertados, o tomamos los que envió el usuario (que pueden no haberse insertado tal cual) o hacemos una selección para mostrárselos
            if ($resultado)
            echo "<script>alert('Usuario modificado correctamente'); location.href='mostrarUsuarios.php';</script>";
            else
                echo "<script>alert('No se ha podido realizar la modificación'); location.href='modificarCamiseta.php?id_camiseta=".$id_camiseta."';</script>";

            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);

        ?>

    </body>
</html>