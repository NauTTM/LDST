<?php
session_start();

include('ConexBD.php');

@ $email=$_POST['email'];
@ $password=$_POST['password'];

$email = trim($email);
$password = trim($password);

// Comprobamos que no estén vacíos
if (!$email || !$password){
    echo "Faltan datos";
}

$query = "select * from usuarios where email ='".$email."' and password= '".$password."'";
// echo "<br>" . $query ."<br>" ;
$result = mysqli_query($db, $query);
$num = mysqli_num_rows($result);


if ($num > 0) {
    $row = mysqli_fetch_assoc($result);

    // Datos de la sesion
    $_SESSION['email'] = $row['email'];
    $_SESSION['privilegio'] = $row['privilegio'];

    // Comprobar privilegios
    if ($row['privilegio'] === 'C') {
        header("Location: index.php");
        exit();
    } elseif ($row['privilegio'] === 'A') {
        header("Location: indexAdmin.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    echo "<script>alert('Usuario o contraseña incorrectos.');history.back();</script>";
}

mysqli_close($db);
?>