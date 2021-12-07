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
        
        //errores nuevo usuario

        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] == "1") $msg = "Los campos para registro no existen";
            if($_GET['err'] == "2") $msg = "Debes de rellena todos los campos del formulario para poder registrarte";
            if($_GET['err'] == "3") $msg = "Las contraseñas no coinciden";
            if($_GET['err'] == "4") $msg =  header("location:".$ruta."pages/general/logIn.php?err=4");
            if($_GET['err'] == "5") $msg = "No se ha podido crear tu cuenta, intenta nuevamente";
            if($_GET['err'] == "5") $msg = "Lo que se inserto no es una imagen";
        }

        //check if an ant is delete or not
        if(isset($_GET['delUser']) && $_GET['delUser']!=""){
            // if($_GET['delUser'] == "1") $msg = "Se debe utilizar el formulario de registro";
            // if($_GET['delUser'] == "2") $msg = "Debes de rellena todos los campos del formulario para poder registrarte";
            
        }

        if(isset($_GET['updUser']) && $_GET['updUser']!=""){
            if($_GET['updUser'] == "true")  $msg = "Que bueno, los cambios se guardaron correctamente"; 
            if($_GET['updUser'] == "false")  $msg = "Un problema ha ocurrido, los cambios no fueron realizados";
        }

        if(isset($_GET['NewUser']) && $_GET['NewUser']!=""){
            if($_GET['NewUser'] == "true"){
                $msg = "Un nuevo usuario se ha registrado, gracias por tu aportacion";
            }else if($_GET['NewUser'] == "false"){
                $msg = "Hubo un problema con el registro de usuario nuevo";
            }else if($_GET['NewUser'] == "alrExist"){
                $msg = "El usuario ya existe, por favor ingrese un correo electronico diferente";
            }
        }
        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Usuarios</title>
    <link rel="stylesheet" href="../../css/admin/navbar-title.css">
    <link rel="stylesheet" href="../../css/admin/post-admin.css">
    <link rel="stylesheet" href="../../css/admin/table-content-admin.css">
    

    <?php
        include("../../widgets/web/header-pt2.php");
        include("../../widgets/admin/navbar-pt1.php");
    ?>

    <!-- title navabar -->
    <span class="title-page">Usuarios</span>
    </div>
    <?php
        include("../../widgets/admin/usuarios.php");
    ?>

    <script src="../../js/admin/navbar-admin.js"></script>
    <script src='../../js/general/general.js'> </script>
    <?php

    if($msg!=""){
        echo "<script type=\"text/javascript\">my_alert('".$msg."');</script>";
    }
        include("../../widgets/web/end-file.php");

        
    ?>