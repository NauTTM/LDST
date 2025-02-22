<header>
       <div class="cabecera">
			<a class="logo" href="./index.php" alt="Cabecera"><img src="./iconos/logo2.png" width=120 height=120></a>
		</div>
		
		<div class="dropdown">
                <button class="dropbtn">Mi cuenta</button>
                <div class="dropdown-content">
                    <a href="./verCarrito.php">Carrito de la compra</a>
                    <?php
                    if(@$_SESSION['email'])
                    {
                        echo "<a href='./cerrarSesion.php'>Cerrar Sesión</a>";
                    }
                    else{
                        echo "<a href='./login.php'>Iniciar Sesión</a>";
                    }
                    if(@$_SESSION['privilegio'] === 'A'){
                        echo "<a href='./indexAdmin.php'>Menu Admin</a>";
                    }
 
                    ?>
                </div>
        </div>
		
        <form class="buscador" action="buscarPalabra.php" method="post">
			<input type="text" placeholder="Buscar..." name="palabra">
            <input type="submit" value="Buscar">
        </form>
        <form class="filtro" action='filtro.php' method='POST'>
            <input type="submit" value="Filtrar producto">
        </form>
    </header>
  