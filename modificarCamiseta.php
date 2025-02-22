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

    // Capturar el ID de la camiseta desde la URL
    $id_camiseta = $_GET['id_camiseta'];

        if(!$id_camiseta){
            echo "<script>alert('No se ha recibido el id de la camiseta a modificar');history.back();</script>";
            exit;
        }

    // Escapar el ID para prevenir inyecciones SQL
    $id_camiseta = mysqli_real_escape_string($db, $id_camiseta);

    // Consulta para obtener los datos de la camiseta
    $query = "SELECT * FROM camisetas WHERE id_camiseta = '$id_camiseta'";
    $result = mysqli_query($db, $query);

    // Validar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($db));
    }

    // Obtener los datos de la camiseta
    $row = mysqli_fetch_array($result);

    // Validar si se encontró la camiseta
    if (!$row) {
        echo "<script>alert('Camiseta no encontrada.'); location.href='mostrarCamisetas.php';</script>";
        exit;
    }
    ?>

    <main>
        <div class="centro-pagina">
            <div class="form-container">
                <h2>Editar Camiseta</h2>
                <form action="modificarCamiseta2.php?id_camiseta=<?php echo urlencode($id_camiseta); ?>" method="post">
                    <!-- Campo oculto para enviar el ID de la camiseta -->
                    <input type="hidden" name="id_camiseta" value="<?php echo $id_camiseta; ?>">

                    <div class="form-group">
                        <label for="liga">Liga:</label>
                        <select id="liga" name="liga" required>
                            <option value="LaLiga" <?php if ($row['liga'] == "Liga") echo "selected"; ?>>La liga (ESP)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipo">Equipo:</label>
                        <select id="equipo" name="equipo" required>
                            <option value="Real Madrid" <?php if ($row['equipo'] == "Real Madrid") echo "selected"; ?>>Real Madrid</option>
                            <option value="FC Barcelona" <?php if ($row['equipo'] == "FC Barcelona") echo "selected"; ?>>FC Barcelona</option>
                            <option value="Atletico de Madrid" <?php if ($row['equipo'] == "Atletico de Madrid") echo "selected"; ?>>Atletico de Madrid</option>
                            <option value="Real Valladolid" <?php if ($row['equipo'] == "Real Valladolid") echo "selected"; ?>>Real Valladolid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="equipacion">Equipación:</label>
                        <select id="equipacion" name="equipacion" required>
                            <option value="Local" <?php if ($row['equipacion'] == "Local") echo "selected"; ?>>Local</option>
                            <option value="Visitante" <?php if ($row['equipacion'] == "Visitante") echo "selected"; ?>>Visitante</option>
                            <option value="Alternativa" <?php if ($row['equipacion'] == "Alternativa") echo "selected"; ?>>Alternativa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ano">Temporada:</label>
                        <select id="ano" name="ano" required>
                            <option value="" disabled selected>Selecciona la temporada</option>
                            <option value="2022/2023" <?php if ($row['ano'] == "2022/2023") echo "selected"; ?>>2022/2023</option>
                            <option value="2023/2024" <?php if ($row['ano'] == "2023/2024") echo "selected"; ?>>2023/2024</option>
                            <option value="2024/2025" <?php if ($row['ano'] == "2024/2025") echo "selected"; ?>>2024/2025</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" step="0.01" id="precio" name="precio" value="<?php echo htmlspecialchars($row['precio']); ?>" placeholder="Precio producto" required>
                    </div>

                    <button type="submit">Guardar cambios</button>
                </form>
            </div>
        </div>
    </main>

    <?php
    include("aside.php");
    include("footer.php");
    ?>
</body>