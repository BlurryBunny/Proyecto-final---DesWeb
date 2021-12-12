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

if(!isset($_GET["idAnt"])){
    header("location:".$ruta."pages/admin/hormigas.php?delAnt=false");//no se ha iniciado sesion todavia
}

if($_GET["idAnt"]!=""){
    $c = connectDB();
    $qryRel = "delete  from ants_in_states where id_ant=" .$_GET["idAnt"];
    mysqli_query($c,$qryRel);
        $qry = "delete from ants where id_ant=" .$_GET["idAnt"];
    
        if(!mysqli_query($c,$qry)){
            header("location:".$ruta."pages/admin/hormigas.php?delAnt=false");//no se ha iniciado sesion todavia
        }
        header("location:".$ruta."pages/admin/hormigas.php?delAnt=true");//no se ha iniciado sesion todavia
   
}
?>