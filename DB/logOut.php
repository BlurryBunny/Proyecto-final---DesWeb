<?php
    session_start();
    session_destroy();

    echo "<h1>Hola</h1>";
    include("connectDB.php");
    echo "<h1>Hola</h1>";

    header("location:".$ruta."pages/web/mapa.php"); 
    echo "<h1>Hola</h1>";
?>