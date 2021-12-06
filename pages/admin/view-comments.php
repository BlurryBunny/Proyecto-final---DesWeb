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

        if(!isset($_GET["idPost"]) || $_GET["idPost"]==""){
            header("location:".$ruta."pages/admin/publicaciones.php");//no se ha iniciado sesion todavia
        }

        //check error when the form is submit
        if(isset($_GET['errDelComment']) && $_GET['errDelComment']!=""){
            // if($_GET['errDelComment'] == "1") $msg = "No existen los campos a registrar";
            // if($_GET['errNewState'] == "2") $msg = "Uno o varios campos estan vacios";
            // if($_GET['errNewState'] == "3") $msg = "No se adjunto ningun archivo en imagen";
            // if($_GET['errNewState'] == "4") $msg = "Lo que se adjunto no es una imagen";
            // if($_GET['errNewState'] == "5") header("location:".$ruta."pages/admin/estados.php?newState=true");
        }

        
        if(isset($_GET['newComment']) && $_GET['newComment']!=""){
            if($_GET['newComment'] == "true") $msg ="Que mal, no pudismos hacer actualizar la informacion";
            if($_GET['newComment'] == "false") $msg = "Que mal, no pudimos agregar comentario";
        
        }


        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Nuevo estado</title>
    <link rel="stylesheet" type="text/css" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/general/nuevo-editar-hormiga.css">    
    
    <?php
        include("../../widgets/web/header-pt2-without-bootstrap.php");
        include("../../widgets/admin/view-comments.php");
        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
        include("../../widgets/web/end-file.php");
    ?>