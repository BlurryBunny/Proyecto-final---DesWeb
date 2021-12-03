<?php
        include("../../DB/connectDB.php");
        $msg = "";
        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] == "1") $msg = "Se debe utilizar el formulario de registro";
            if($_GET['err'] == "2") $msg = "Debes de rellena todos los campos del formulario para poder registrarte";
            if($_GET['err'] == "3") $msg = "Las contraseñas no coinciden";
            if($_GET['err'] == "4") $msg =  header("location:".$ruta."pages/general/logIn.php?err=4");
            if($_GET['err'] == "5") $msg = "No se ha podido crear tu cuenta, intenta nuevamente";
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
    <span class="title-page">Estados</span>
    </div>
    <?php
        include("../../widgets/admin/estados.php");
    ?>

    <script src="../../js/admin/navbar-admin.js"></script>
    <?php
        include("../../widgets/web/end-file.php");

        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
    ?>