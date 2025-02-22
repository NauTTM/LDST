
<?php
    include('ConexBD.php');

    foreach ($_POST['privilegio'] as $email => $nuevo_privilegio) {
         // Actualizar el privilegio en la base de datos
        $query = "UPDATE usuarios SET privilegio = '$nuevo_privilegio' WHERE email = '$email'";
        $result = mysqli_query($db, $query);

        if (!$result) {
            echo "Error al actualizar el privilegio de $email: " . mysqli_error($db);
        }
    }

    echo "Privilegios actualizados correctamente.";

    // Redirigir de vuelta a la página de mostrar usuarios
    header("Location: mostrarUsuarios.php");
    exit();
?>