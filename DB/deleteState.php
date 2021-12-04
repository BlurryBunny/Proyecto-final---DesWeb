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

if(!isset($_GET["idState"])){
    header("location:".$ruta."pages/admin/estados.php?delState=false");//no se ha iniciado sesion todavia
}

if($_GET["idState"]){
    $c = connectDB();
    $qry = "delete from states where id_state=" .$_GET["idState"];
    mysqli_query($c,$qry);
    mysqli_close($c);
    header("location:".$ruta."pages/admin/estados.php?delState=true");//no se ha iniciado sesion todavia
}
?>