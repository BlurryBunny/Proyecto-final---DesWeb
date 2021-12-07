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
            if($_GET['err'] == "3") $msg = "Lo que se subio no es una imagen";
            if($_GET['err'] == "4") $msg = "No existe el formulario para fotografia ";

        }

        //check if an ant is delete or not
        if(isset($_GET['delAnt']) && $_GET['delAnt']!=""){
            if($_GET['delAnt'] == "true") $msg = "Se ha eliminado la hormiga correctamente";
            if($_GET['delAnt'] == "false") $msg = "Hubo un error al eliminar hormiga";
        }

        if(isset($_GET['updAnt']) && $_GET['updAnt']!=""){
            if($_GET['updAnt'] == "true") $msg = "Que bueno, los cambios se guardaron correctamente";
            if($_GET['updAnt'] == "false") $msg = "No se pudieron hacer los cambios";
        }


        if(isset($_GET['newAnt']) && $_GET['newAnt']!=""){
            if($_GET['newAnt'] == "true"){
                $msg = "Una nueva hormiga se ha registrado, gracias por tu aportacion";
            }else{
                $msg = "Hubo un problema con el registro de hormiga";
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
    <span class="title-page">Hormigas</span>
    </div>
    <?php
        include("../../widgets/admin/hormigas.php");
    ?>

    <script src="../../js/admin/navbar-admin.js"></script>
    <script src='../../js/general/general.js'> </script>
    <?php

    if($msg!=""){
        echo "<script type=\"text/javascript\">my_alert('".$msg."');</script>";
    }
        include("../../widgets/web/end-file.php");

        
    ?>