<?php
    session_start();
    include("head.php");
    if ($_SESSION['privilegio'] !== 'A') {
        header("Location: index.php");
        exit();
    }
?>

<body>
    <?php
        include("header.php");

        include('ConexBD.php');
        $email=$_GET['email'];
        if(!$email){
            header('location: mostrarUsuarios.php');  
            exit;
        }
        // Verificar si el email ya existe en la base de datos
        $query = "SELECT * FROM usuarios WHERE email='" . $email . "'";
        $result = mysqli_query( $db, $query);
        $row = mysqli_fetch_array($result);

    ?>
    
    <main>
        <div class="centro-pagina">
            <div class="form-container">
                <h2>Modificar Usuario</h2>
                <form action="modificarUsuario2.php?email=<?php echo urlencode($email); ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" maxlength="70" id="nombre" name="nombre" value="<?php echo $row['nombre'];?>" placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" maxlength="30" id="apellidos" name="apellidos"  value="<?php echo $row['apellidos'];?>" placeholder="Ingresa tus apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de nacimiento:</label>
                        <input type="text" id="fecha" name="fecha" placeholder="DD/MM/YYYY"  value="<?php echo $row['fecha'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="text" maxlength="50" id="email" name="email" placeholder="Ingresa tu correo"  value="<?php echo $row['email'];?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" maxlength="20" id="password" name="password" placeholder="Crea una contraseña"  value="<?php echo $row['password'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar_password">Confirmar contraseña:</label>
                        <input type="password" maxlength="20" id="confirmar_password" name="confirmar_password" placeholder="Repite la contrasena"  value="<?php echo $row['password'];?>" required>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="privilegio" value="C" <?php echo ($row['privilegio'] === 'C') ? 'checked' : ''; ?>>Cliente
                        <input type="radio" name="privilegio" value="A" <?php echo ($row['privilegio'] === 'A') ? 'checked' : ''; ?>>Administrador
                    </div>
                    <button type="submit">Guardar cambios</button>
                </form>
            </div>
        </div>
    </main>
   
    <?php
        include("aside.php");
    ?>

    <?php
        include("footer.php");
    ?>
    
    
</body>
