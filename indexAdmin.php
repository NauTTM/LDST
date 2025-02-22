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
    ?>
    <main>
        <style>
            .contenedor {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 12%;
            }

            .boton {
                background-color: #4CAF50; /* Verde */
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            .boton:hover {
                background-color: #45a049;
            }
        </style>
        <div class="contenedor">
            <button class="boton" onclick="location.href='mostrarUsuarios.php'">Mostrar Usuarios</button>
            <button class="boton" onclick="location.href='mostrarCamisetas.php'">Mostrar Productos</button>
            <button class="boton" onclick="location.href='registroCamiseta.php'">Añadir Producto</button>
            <button class="boton" onclick="location.href='index.php'">Navegar en la web</button>
        </div>
       
    </main>

    <?php
        include("aside.php");
    ?>

    <?php
      include("footer.php");
    ?>           

</body>
</html>