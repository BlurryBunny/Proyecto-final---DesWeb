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
            if($_GET['err'] == "3") $msg = "No existen los datos para hacer la consulta";
            // if($_GET['err'] == "4") $msg =  header("location:".$ruta."pages/general/logIn.php?err=4");
            // if($_GET['err'] == "5") $msg = "No se ha podido crear tu cuenta, intenta nuevamente";
        }

        //check if an ant is delete or not
        if(isset($_GET['delState']) && $_GET['delState']!=""){
             if($_GET['delState'] == "true")  $msg = "Se ha borrado el estado correctamente";
             if($_GET['delState'] == "false") $msg = "No se ha podido borrar el estado";
        }

        if(isset($_GET['updState']) && $_GET['updState']!=""){
            if($_GET['updState'] == "true") $msg = "Que bueno, los cambios se guardaron correctamente";
            if($_GET['updState'] == "false") $msg = "Los cambios no se han guardado";
        }

        if(isset($_GET['newState']) && $_GET['newState']!=""){
            if($_GET['newState'] == "true"){
                $msg = "Un nuevo estado se ha registrado, gracias por tu aportacion";
            }else if ($_GET['newState'] == "false"){
                $msg = "Hubo un problema con el registro de estado";
            }else if ($_GET['newState'] == "alrExist"){
                $msg = "El estado ya esta registrado, intenta con uno diferente";
            }
        }
        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Estados</title>
    <link rel="stylesheet" href="../../css/admin/navbar-title.css">
    <link rel="stylesheet" href="../../css/admin/post-admin.css">
    <link rel="stylesheet" href="../../css/admin/table-content-admin.css">
    

    <?php
        include("../../widgets/web/header-pt2.php");
        include("../../widgets/admin/navbar-pt1.php");
        
    ?>

    <!-- title navabar -->
    <span class="title-page">Estados</span>
    </div>
    <?php
        include("../../widgets/admin/estados.php");
    ?>

    <script src="../../js/admin/navbar-admin.js"></script>
    <script src='../../js/general/general.js'> </script>
    <?php

    if($msg!=""){
        echo "<script type=\"text/javascript\">my_alert('".$msg."');</script>";
    }
        include("../../widgets/web/end-file.php");

        
    ?>