<?php
    session_start();
    include("../../DB/connectDB.php");


    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    $rol_user = get_user_rol($_SESSION["idU"]);
    if($rol_user != "Administrador"){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    if(!isset($_GET["idPost"]) || $_GET["idPost"] == ""){
        header("location:".$ruta."pages/admin/publicaciones.php?err=3");
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