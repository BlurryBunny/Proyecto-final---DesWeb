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

        if(isset($_GET['delPost']) && $_GET['delPost']!=""){
            if($_GET['delPost'] == "true") $msg = "Se ha borrado el comentario, gracias";
            if($_GET['delPost'] == "false") $msg = "Hubo un problema al borrar el comentario";
           
        }

        //check if an ant is delete or not
        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] == "1") $msg = "Se debe utilizar el formulario de registro";
            if($_GET['err'] == "2") $msg = "Debes de rellena todos los campos del formulario para poder registrarte";
            if($_GET['err'] == "3") $msg = "Lo que se inserto no es una imagen";
            if($_GET['err'] == "4") $msg =  "No existe el comentario a borrar";
            // if($_GET['err'] == "5") $msg = "No se ha podido crear tu cuenta, intenta nuevamente";
        }

        if(isset($_GET['updPost']) && $_GET['updPost']!=""){
            if($_GET['updPost'] == "true") $msg = "Que bueno, los cambios se guardaron correctamente";
            if($_GET['updPost'] == "false") $msg = "Hubo un problema al actualizar el post";
        }

        if(isset($_GET['newPost']) && $_GET['newPost']!=""){
            if($_GET['newPost'] == "true"){
                $msg = "Un nuevo post se ha agregado, gracias por tu aportacion";
            }else{
                $msg = "Hubo un problema al crear el post";
            }
        }

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Publicaciones</title>
    <link rel="stylesheet" href="../../css/admin/navbar-title.css">
    <link rel="stylesheet" href="../../css/admin/post-admin.css">
    <link rel="stylesheet" href="../../css/admin/table-content-admin.css">
    

    <?php
        include("../../widgets/web/header-pt2.php");
        include("../../widgets/admin/navbar-pt1.php");
        
    ?>

    <!-- title navabar -->
    <span class="title-page">Publicaciones</span>
    </div>
    <?php
        include("../../widgets/admin/publicaciones.php");
    ?>

    <script src="../../js/admin/navbar-admin.js"></script>
    <script src='../../js/general/general.js'> </script>
    <?php

    if($msg!=""){
        echo "<script type=\"text/javascript\">my_alert('".$msg."');</script>";
    }
        include("../../widgets/web/end-file.php");

        
    ?>