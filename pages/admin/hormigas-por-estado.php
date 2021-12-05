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
            if($_GET['err'] == "1") $msg = "No existen los valores en el registro";
            if($_GET['err'] == "2") $msg = "Los campos o alguno de ellos esta vacio";
            
        }

        //check if an ant is delete or not
        if(isset($_GET['delRelStateAnt']) && $_GET['delRelStateAnt']!=""){

        }

        

        if(isset($_GET['newRelStateAnt']) && $_GET['newRelStateAnt']!=""){
            if($_GET['newRelStateAnt'] == "true"){
                $msg = "Una nueva relacion de hormiga en estado se ha registrado, gracias por tu aportacion";
            }else{
                $msg = "Hubo un problema con el registro de estado";
            }
        }
        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>

    <title>Relaciones Hormigas por Estado</title>
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
        include("../../widgets/admin/hormigas-por-estado.php");
    ?>

    <script src="../../js/admin/navbar-admin.js"></script>
    <?php
        include("../../widgets/web/end-file.php");

        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
    ?>