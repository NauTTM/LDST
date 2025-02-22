<html>
    <head>
       
    </head>
    <body>
        <?php
            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
             $nombre=$_POST['nombre'];
             $email=$_POST['email'];
             $apellidos=$_POST['apellidos'];
             $fecha=$_POST['fecha'];
             $password=$_POST['password'];
             $confirmar_password=$_POST['confirmar_password'];


            //Recortamos caracteres en blanco al principio y final de la cadena con trim
            $nombre = trim($nombre);
            $email = trim($email);
            $apellidos = trim($apellidos);
            $fecha = trim($fecha);
            $password = trim($password);
            $confirmar_password = trim($confirmar_password);
            

            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if (!$nombre || !$email || !$apellidos || !$fecha || !$password  || !$confirmar_password)
            {
                echo "<script>alert('No ha introducido toda la informaci&oacute;n requerida para el cliente');history.back();</script>";

            }
            
            // Comprobar fecha
            if (!preg_match('/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/', $fecha)) {
                echo "<script>alert('La fecha introducida no tiene formato correcto (DD/MM/YYYY)');history.back();</script>";
                exit;
            }

            // Comprobar correo
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('El email introducido no cumple el formato correcto (nombre@gmail.com)');history.back();</script>";
                exit;
            }

            if ($password !== $confirmar_password) {
                echo "<script>alert('Las contraseñas no coinciden');history.back();</script>";
                exit;
            }

            
            $fecha_array=explode('/',$fecha);
            $fecha_array_vuelta=array_reverse($fecha_array);
            $fecha=implode('-',$fecha_array_vuelta); 

            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
            $nombre = addslashes($nombre);
            $email = addslashes($email);
            $apellidos = addslashes($apellidos);
            $fecha = addslashes($fecha);
            $password = addslashes($password);
            $confirmar_password = addslashes($confirmar_password);
            

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD.php');
            

            // Verificar si el email ya existe en la base de datos
            $email_check_query = "SELECT email FROM usuarios WHERE email = '". $email ."'";
            $email_check_result = mysqli_query($db, $email_check_query);

            if (mysqli_num_rows($email_check_result) > 0) {
                 echo "<script>alert('El email introducido ya esta registrado');history.back();</script>";
            exit;
            }
                       
            //Definimos una cadena con la consulta que queremos hacer. Es recomendable sacar las variables de las comillas. Cuidado con el juego de comillas, es donde se suelen producir los errores.
            $query = "insert into usuarios values 
            ('". $email ."', '". $password ."', '". $nombre ."', '". $apellidos ."', '".$fecha."', 'C')"; 
            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            // echo "<br>" . $query . "<br>";
            
            //Enviamos la consulta para su ejecución en la BD con mysqli_query
            $resultado = mysqli_query($db, $query);

            //En las consultas de inserción, modificación o borrado, sólo se informa de si se ha hecho correctamente o no, no hay datos que volcar, por lo que son más fáciles.
            //La función mysqli_affected_rows devuelve el número de registros que se han visto afectados con la operación.
            //Si siempre va a ser 1 como en este caso, no sería necesario/conveniente utilizarla y con decir que se ha llevado a cabo correctamente la operación valdría.
            //Si quisiéramos mostrarle los datos insertados, o tomamos los que envió el usuario (que pueden no haberse insertado tal cual) o hacemos una selección para mostrárselos
            if ($resultado)
               // echo  "N&uacute;mero de clientes introducidos: " . mysqli_affected_rows($db);           
               header('location: index.php');  
            else
                echo "Se ha producido un error y no se ha podido llevar a cabo la operaci&oacute;n.";

            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);

        ?>

    </body>
</html>
