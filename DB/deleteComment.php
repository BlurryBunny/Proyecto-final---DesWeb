<?php
include("connectDB.php");
session_start();

if(!isset($_SESSION["idU"])){
    header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
}

$rol_user = get_user_rol($_SESSION["idU"]);
// if($rol_user != "Administrador"){
//     header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
// }

if(!isset($_GET["idComment"]) || !isset($_GET["idPost"]) ){
    header("location:".$ruta."pages/admin/view-comments.php?errDelComment=1&idPost=".$_GET["idPost"]);//no se ha iniciado sesion todavia
}

if($_GET["idComment"]!="" &&  $_GET["idPost"]){
    $c = connectDB();
    $qry = "delete from comments where id_comment=" .$_GET["idComment"];
    if (mysqli_query($c,$qry)){
        if($rol_user=="Administrador"){
            header("location:".$ruta."pages/admin/view-comments.php?delComment=true&idPost=".$_GET["idPost"]);//Se ha borrado el comentario
        }else{
            header("location:".$ruta."pages/web/modificarUsuario.php?delComment=true");//no se ha iniciado sesion todavia
        }
    }

    if($rol_user=="Administrador"){
        header("location:".$ruta."pages/admin/view-comments.php?delComment=false&idPost=".$_GET["idPost"]);//Se ha borrado el comentario
    }else{
        header("location:".$ruta."pages/web/modificarUsuario.php?delComment=false");//no se ha iniciado sesion todavia
    }
    mysqli_close($c);
}
?>