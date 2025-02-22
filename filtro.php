<?php
    include("head.php");
    include("header.php");
    session_start();
?>

<body>
    
    <main>
        <section>   
        <div class="centro-pagina">
        <form class="form-container" action="busquedaFiltro.php" method="post">
            <h2>Busqueda Avanzada</h2>

            <div class="form-group">
                <label for="equipo">Equipo: </label>
                <input type="text" name="equipo">
            </div>

            <div class="form-group">
                <label for="liga">Liga: </label>
                <input type="text" name="liga">
            </div>

            </div>
            
            <div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 10vh; flex-direction: column;" >
                <label for="precio">Precio máximo: </label>
                <input type="number" name="precio">
                <button type="submit">Buscar</button>
            </div>    
            
        </form>
        </div>
        </section>
    </main>
   
    <?php
        include("aside.php");
    ?>

    <?php
        include("footer.php");
    ?>
    
    
</body>