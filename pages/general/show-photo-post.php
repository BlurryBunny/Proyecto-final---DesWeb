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
    $qry = "select photo,type_photo from posts where id_post = ".$_GET["idPost"];
    $rs= mysqli_query($c,$qry);
    
    //transform the request in an image
    $imagen = mysqli_fetch_array($rs);
    header("Content-type:".$imagen["type_photo"]);
    
    //add the photo to the html
    echo $imagen["photo"];

    //close the conection and return the origin file 
    mysqli_close($c);
?>