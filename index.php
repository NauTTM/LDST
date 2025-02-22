<?php
  session_start();
    include("head.php");
?>

<body>
    <?php
        include("header.php");

        /*echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";*/

    ?>
    
    <main>
      <!--4 fotos que salen nada más abrir la web-->
      <div class="fotos_inicio" style="display: flex; flex-wrap: wrap; justify-content: center;">
        <img src="./iconos/sylla.png" alt="sylla" width="250" height="300">
        <img src="./iconos/griezmann.png" alt="griezmann" width="250" height="300">
        <img src="./iconos/mbappe.jpg" alt="mbappe" width="250" height="300">
        <img src="./iconos/lamine_yamal.jpeg" alt="lamine_yamal" width="250" height="300">     
      </div>
      <!--Los pasos a seguir explicados-->
      <div class="info">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <img src="./iconos/monigote2.jpg" alt="Monigote" width="200" height="200">
            <p>1º SELECCIONA LA LIGA QUE DESEES</p>
            <p>2º BUSCA UN EQUIPO</p>
            <p>3º VISTE LAS CAMISETAS DE TUS CRACKS FAVORITOS</p>
        </div>                    
      </div>
       
    </main>
  <!-- Seleccionador de ligas del lado izquierdo -->
  <?php
      include("aside.php");
    ?>


  <?php
      include("footer.php");
  ?>
</body>
</html>