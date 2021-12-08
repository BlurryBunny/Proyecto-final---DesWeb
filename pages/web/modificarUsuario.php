<?php
        include("../../DB/connectDB.php");
        session_start();
        $msg = "";

        if(!isset($_SESSION["idU"])){
            header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
        }

        $rol_user = get_user_rol($_SESSION["idU"]);

        //check error when the form is submit
        if(isset($_GET['err']) && $_GET['err']!=""){
            // if($_GET['err'] == "1") $msg = "No existen los campos a registrar";
            // if($_GET['err'] == "2") $msg = "Uno o varios campos estan vacios";
            // if($_GET['err'] == "3") $msg = "No se adjunto ningun archivo en imagen";
            // if($_GET['err'] == "4") $msg = "Lo que se adjunto no es una imagen";
            // if($_GET['err'] == "5") header("location:".$ruta."pages/admin/hormigas.php?newAnt=true");
        }

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Modificar perfil</title>
    <link rel="stylesheet" type="text/css" href="../../css/general/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/general/nuevo-editar-hormiga.css">  
    <link rel="stylesheet" href="../../css/general/modificar-usuario.css">  
   
    <?php
        include("../../widgets/web/header-pt2-without-bootstrap.php");
        include("../../widgets/web/modificarUsuario.php");
    ?>

    <script src='../../js/general/general.js'> </script>
    <?php
        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
        include("../../widgets/web/end-file.php");
    ?>
