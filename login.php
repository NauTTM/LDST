<?php
session_start();
    include("head.php");
?>

<body>
    <?php
        include("header.php");
    ?>
    
    <main>
        <div class="login-wrapper">
            <div class="login-container">
                <h2>Iniciar Sesión</h2>
                <form id="loginForm" action="inicio_usuario.php" method="post">
                    <div class="form-group">
                        <label for="email">Usuario:</label>
                        <input type="text" id="email" name="email" placeholder="Introduce tu email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                    </div>
                    <button type="submit">Entrar</button>
                    <!--<input type="submit" value="Entrar">-->

                    <a class='button4' href="./registroUsuario.php">Registrarse</a>
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