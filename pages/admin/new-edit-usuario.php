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
        if(isset($_GET['err']) && $_GET['err']!=""){
            // if($_GET['err'] == "1") $msg = "No existen los campos a registrar";
            // if($_GET['err'] == "2") $msg = "Uno o varios campos estan vacios";
            // if($_GET['err'] == "3") $msg = "No se adjunto ningun archivo en imagen";
            // if($_GET['err'] == "4") $msg = "Lo que se adjunto no es una imagen";
            // if($_GET['err'] == "5") header("location:".$ruta."pages/admin/hormigas.php?newAnt=true");
        }

        
        if(isset($_GET['updPost']) && $_GET['updPost']!=""){
            if($_GET['updPost'] == "true") $msg = header("location:".$ruta."pages/admin/publicaciones.php?updPost=true");
            if($_GET['updPost'] == "false") $msg = "Que mal, no pudismos hacer actualizar la informacion";
        
        }
        
        if(isset($_GET['newPost']) && $_GET['newPost']!=""){
            if($_GET['newPost'] == "true") $msg = header("location:".$ruta."pages/admin/publicaciones.php?newPost=true");
            if($_GET['newPost'] == "false") $msg = "Hubo un error al intentar subir el post, intenta de nuevo";
        
        }

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Nueva hormiga</title>
    <link rel="stylesheet" type="text/css" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/general/nuevo-editar-hormiga.css">    
    
    <?php
        include("../../widgets/web/header-pt2-without-bootstrap.php");
        
        include("../../widgets/admin/new-edit-usuario.php");
        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
        include("../../widgets/web/end-file.php");
    ?>