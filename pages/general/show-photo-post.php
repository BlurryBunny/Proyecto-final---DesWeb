<?php
    session_start();
    include("../../DB/connectDB.php");

    //verificar si existe un dato
    if(!isset($_GET["idPost"])){
        header("location:".$ruta."pages/web/mapa.php");
    }

    if($_GET["idPost"] == ""){
        header("location:".$ruta."pages/web/mapa.php");
    }
    
    //responder con la imagen
    $c =connectDB();
    $qry = "select photo_ant,photo_type from ants where id_ant = ".$_GET["idAnt"];
    $rs= mysqli_query($c,$qry);
    
    //transform the request in an image
    $imagen = mysqli_fetch_array($rs);
    header("Content-type:".$imagen["photo_type"]);
    
    //add the photo to the html
    echo $imagen["photo_ant"];

    //close the conection and return the origin file 
    mysqli_close($c);
?>