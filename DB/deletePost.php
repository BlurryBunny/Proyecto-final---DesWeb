<?php
include("connectDB.php");
session_start();

if(!isset($_SESSION["idU"])){
    header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
}

$rol_user = get_user_rol($_SESSION["idU"]);
if($rol_user != "Administrador"){
    header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
}

if(!isset($_GET["idPost"])){
    header("location:".$ruta."pages/admin/publicaciones.php?err=4");//no se ha iniciado sesion todavia
}

if($_GET["idPost"] !=""){
    $c = connectDB();
    $qry = "delete from posts where id_post=" .$_GET["idPost"];
    
    if(mysqli_query($c,$qry)){
        header("location:".$ruta."pages/admin/publicaciones.php?delPost=true");//no se ha iniciado sesion todavia
    }

    header("location:".$ruta."pages/admin/publicaciones.php?delPost=false");//no se ha iniciado sesion todavia
}
?>