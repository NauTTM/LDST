<?php
session_start();
    include("head.php");
?>
<!--Igual a lo que hay en el index.php-->
<body>
    <?php
        include("header.php");
    ?>
    <!--Es una tabla hecha con el grid css para que aparezcan los escudos de los equipos en 5 columnas x 4 filas-->
    <main>
        <div class="grid-container2">
           <?php
            include('ConexBD.php');
            $liga = $_GET['liga'];
          ?> 
           
            <a class="equipo" href="productos.php?equipo=Real Valladolid&liga=LaLiga" alt="valladolid"><img src="./laliga/valladolid.jpg" width="120" height="120"></a>
            <a class="equipo" href="productos.php?equipo=FC Barcelona&liga=LaLiga" alt="barcelona"><img src="./laliga/barcelona.png" width="120" height="120"></a>
            <a class="equipo" href="productos.php?equipo=Real Madrid&liga=LaLiga" alt="realmadrid"><img src="./laliga/real madrid.png" width="120" height="120"></a>
           
            <a class="equipo" href="productos.php?equipo=Atletico de Madrid&liga=LaLiga" alt="atletico"><img src="./laliga/atletico.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="betis"><img src="./laliga/betis.png" width="120" height="120"></a>
          
            <a class="equipo" href="./premier.php" alt="sevilla"><img src="./laliga/sevilla.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="alaves"><img src="./laliga/alaves.jpg" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="realsociedad"><img src="./laliga/real_sociedad.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="leganes"><img src="./laliga/leganes.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="laspalmas"><img src="./laliga/las palmas.jpg" width="120" height="120"></a>
          
            <a class="equipo" href="./premier.php" alt="espanyol"><img src="./laliga/espanyol.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="osasuna"><img src="./laliga/osasuna.jpg" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="rayovallecano"><img src="./laliga/rayo vallecano.jpg" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="athletic"><img src="./laliga/athletic.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="valencia"><img src="./laliga/valencia.png" width="120" height="120"></a>
          
            <a class="equipo" href="./premier.php" alt="girona"><img src="./laliga/girona.png" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="celta"><img src="./laliga/celta.jpg" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="getafe"><img src="./laliga/getafe.jpg" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="mallorca"><img src="./laliga/mallorca.jpg" width="120" height="120"></a>
            <a class="equipo" href="./premier.php" alt="villarreal"><img src="./laliga/villarreal.jpg" width="120" height="120"></a> 
                  
        </div>
            

    </main>

    <?php
        include("aside.php");
    ?>

    <?php
        include("footer.php");
    ?>
    
    
</body>