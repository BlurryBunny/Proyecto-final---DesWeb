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

    if(!isset($_GET["idUser"]) || $_GET["idUser"] =="" ){
        header("location:".$ruta."pages/admin/usuarios.php?errDelUser=1");//no se ha iniciado sesion todavia
    }

    
        $c = connectDB();
        $qry = "delete from users where id_user=" .$_GET["idUser"];
        $rs = mysqli_query($c,$qry);
        mysqli_close($c);

        if($rs){
            header("location:".$ruta."pages/admin/usuarios.php?errDelUser=2");//Se ha borrado el comentario
        }else{
            header("location:".$ruta."pages/admin/usuarios.php?errDelUser=3");//Se ha borrado el comentario
        }
?>