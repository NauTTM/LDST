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
        <div class="centro-pagina">
            <div class="form-container">
                <h2>Registro de Camiseta</h2>
                <form action="camiseta.php" method="post">

                <div class="form-group">
                        <label for="liga">Liga:</label>
                        <select id="liga" name="liga" required>
                            <option value="" disabled selected>Selecciona una liga</option>
                            <option value="LaLiga">La liga (ESP)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipo">Equipo:</label>
                        <select id="equipo" name="equipo" required>
                            <option value="" disabled selected>Selecciona un equipo</option>
                            <option value="Real Madrid">Real Madrid</option>
                            <option value="FC Barcelona">FC Barcelona</option>
                            <option value="Real Valladolid">Real Valladolid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipacion">Equipacion:</label>
                        <select id="equipacion" name="equipacion" required>
                            <option value="" disabled selected>Selecciona la equipación</option>
                            <option value="Local">Local</option>
                            <option value="Visitante">Visitante</option>
                            <option value="Alternativa">Alternativa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ano">Temporada:</label>
                        <select id="ano" name="temporada" required>
                            <option value="" disabled selected>Selecciona la temporada</option>
                            <option value="2024/2025">2024/2025</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" step="0.01" id="precio" name="precio" placeholder="Precio producto" required>
                    </div>
                    
                    <button type="submit">Registrar</button>
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