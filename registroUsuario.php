<?php
    session_start();
    include("head.php");
?>

<body>
    <?php
        include("header.php");
    ?>
    
    <main>
        <div class="centro-pagina">
            <div class="form-container">
                <h2>Registro de Usuario</h2>
                <form action="usuario.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" maxlength="70" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" maxlength="30" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de nacimiento:</label>
                        <input type="text" id="fecha" name="fecha" placeholder="DD/MM/YYYY" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="text" maxlength="50" id="email" name="email" placeholder="Ingresa tu correo" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" maxlength="20" id="password" name="password" placeholder="Crea una contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar_password">Confirmar contraseña:</label>
                        <input type="password" maxlength="20" id="confirmar_password" name="confirmar_password" placeholder="Repite la contrasena" required>
                    </div>
                    <button type="submit">Registrar</button>
                </form>
                <div class="form-footer">
                    ¿Ya tienes una cuenta? <a href="./login.php">Inicia sesión</a>
                </div>
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