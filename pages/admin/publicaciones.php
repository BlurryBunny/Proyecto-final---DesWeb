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

        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] == "1") $msg = "Se debe utilizar el formulario de registro";
            if($_GET['err'] == "2") $msg = "Debes de rellena todos los campos del formulario para poder registrarte";
            if($_GET['err'] == "3") $msg = "Las contraseñas no coinciden";
            if($_GET['err'] == "4") $msg =  header("location:".$ruta."pages/general/logIn.php?err=4");
            if($_GET['err'] == "5") $msg = "No se ha podido crear tu cuenta, intenta nuevamente";
        }

        //check if an ant is delete or not
        if(isset($_GET['delPost']) && $_GET['delPost']!=""){
            // if($_GET['err'] == "1") $msg = "Se debe utilizar el formulario de registro";
            // if($_GET['err'] == "2") $msg = "Debes de rellena todos los campos del formulario para poder registrarte";
            // if($_GET['err'] == "3") $msg = "Las contraseñas no coinciden";
            // if($_GET['err'] == "4") $msg =  header("location:".$ruta."pages/general/logIn.php?err=4");
            // if($_GET['err'] == "5") $msg = "No se ha podido crear tu cuenta, intenta nuevamente";
        }

        if(isset($_GET['updPost']) && $_GET['updPost']!=""){
            if($_GET['updPost'] == "true") $msg = "Que bueno, los cambios se guardaron correctamente";
        }

        if(isset($_GET['newPost']) && $_GET['newPost']!=""){
            if($_GET['newPost'] == "true"){
                $msg = "Un nuevo estado se ha registrado, gracias por tu aportacion";
            }else{
                $msg = "Hubo un problema con el registro de estado";
            }
        }

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Hormigas</title>
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
    <?php
        include("../../widgets/web/end-file.php");

        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
    ?>