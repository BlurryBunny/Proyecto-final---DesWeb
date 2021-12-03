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
        if(isset($_GET['errNewAnt']) && $_GET['errNewAnt']!=""){
            if($_GET['errNewAnt'] == "1") $msg = "No existen los campos a registrar";
            if($_GET['errNewAnt'] == "2") $msg = "Uno o varios campos estan vacios";
            if($_GET['errNewAnt'] == "3") $msg = "No se adjunto ningun archivo en imagen";
            if($_GET['errNewAnt'] == "4") $msg = "Lo que se adjunto no es una imagen";
            if($_GET['errNewAnt'] == "5") header("location:".$ruta."pages/admin/hormigas.php?newAnt=true");
        }
        

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Nueva hormiga</title>
    <link rel="stylesheet" type="text/css" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/general/nuevo-editar-hormiga.css">    
    
    <?php
        include("../../widgets/web/header-pt2-without-bootstrap.php");
        include("../../widgets/admin/new-edit-hormiga.php");
        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
        include("../../widgets/web/end-file.php");
    ?>