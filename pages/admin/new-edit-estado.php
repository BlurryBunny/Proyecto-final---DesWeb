<?php
        include("../../DB/connectDB.php");
        session_start();
        $msg = "";

        if(!isset($_SESSION["idU"])){
            header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
        }

        $rol_user = get_user_rol($_SESSION["idU"]);
        if($rol_user != "Administrador"){
            header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
        }

        //check error when the form is submit
        if(isset($_GET['errNewState']) && $_GET['errNewState']!=""){
            if($_GET['errNewState'] == "1") $msg = "No existen los campos a registrar";
            if($_GET['errNewState'] == "2") $msg = "Uno o varios campos estan vacios";
            if($_GET['errNewState'] == "3") $msg = "No se adjunto ningun archivo en imagen";
            if($_GET['errNewState'] == "4") $msg = "Lo que se adjunto no es una imagen";
            if($_GET['errNewState'] == "5") header("location:".$ruta."pages/admin/estados.php?newState=true");
        }

        
        if(isset($_GET['updState']) && $_GET['updState']!=""){
            if($_GET['updState'] == "true") $msg = header("location:".$ruta."pages/admin/estados.php?updState=true");
            if($_GET['updState'] == "false") $msg = "Que mal, no pudismos hacer actualizar la informacion";
        
        }

        if(isset($_GET['newState']) && $_GET['newState']!=""){
            if($_GET['newState'] == "true") $msg = header("location:".$ruta."pages/admin/estados.php?updState=true");
        }

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Nuevo estado</title>
    <link rel="stylesheet" type="text/css" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/general/nuevo-editar-hormiga.css">    
    
    <?php
        include("../../widgets/web/header-pt2-without-bootstrap.php");
        include("../../widgets/admin/new-edit-estado.php");
        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
        include("../../widgets/web/end-file.php");
    ?>