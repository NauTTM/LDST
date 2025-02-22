<header>
       <div class="cabecera">
			<a class="logo" href="./index.php" alt="Cabecera"><img src="./iconos/logo2.png" width=120 height=120></a>
		</div>
		
		<div class="dropdown">
                <button class="dropbtn">Mi cuenta</button>
                <div class="dropdown-content">
                    <?php
                    if(@$_SESSION['email'])
                    {
                        echo "<a href='./cerrarSesion.php'>Cerrar Sesión</a>";
                    }
                    else{
                        echo "<a href='./login.php'>Iniciar Sesión</a>";
                    }
                    ?>
                </div>
        </div>
		
        <div class="buscador">
			<input type="text" placeholder="Buscar...">
            <input type="submit" value="Buscar">
       </div>
    </header>