<?php
    session_start();
    include("head.php");
    include("header.php");

   /* echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>"; */

?>

<?php
    include('ConexBD.php');
    @$liga=$_GET['liga'];
    @$equipo=$_GET['equipo'];
    $query="select * from camisetas where liga ='" . $liga . "' and equipo= '" . $equipo . "'";
    $resultado=mysqli_query($db,$query);
    $num=mysqli_num_rows($resultado);

    //Para ver que variables pasan para aqui
 /*   echo "<pre>";
    var_dump($liga);
    var_dump($equipo);
    echo "</pre>";
    echo "El numero es: " . $num . "<br>"; */

 
?>

<body>
    <main>
        <div class="grid-container">
            <?php
                for($i=0; $i<$num; $i++){
                    $fila=mysqli_fetch_array($resultado);
                    echo '<div class="equipacion-item">
                        <a class="equipacion" alt="camiseta1">
                            <img src="./equipaciones/'.$fila['imagen'].'" width="340" height="330">
                        </a>
                        <div class="producto">
                            <p class="mensaje">'.$fila['equipacion'].'</p>
                            <p class="mensaje">'.$fila['precio'].'€</p>
                            <a href="anadirAlCarrito.php?liga='.$liga.'&equipo='.$equipo.'&id_camiseta='.$fila['id_camiseta'].'"><button class="btn-carrito btn1">Añadir al carrito</button></a>
                        </div>
                    </div>';
                }
            ?>
        </div>
    </main>

    <?php
        include("aside.php");
    ?>

    <?php
        include("footer.php");
    ?>
</body>