    <?php

        include("../../DB/connectDB.php");
        $msg = "";
        if(isset($_GET['err']) && $_GET['err']!=""){
            if($_GET['err'] == "1") $msg = "No se pudo realizar la accion, lo sentimos error de conexion";
            if($_GET['err'] == "2") $msg = "Todos los datos son requeridos";
            if($_GET['err'] == "3") $msg = "No existen elementos para hacer la conexion";
            if($_GET['err'] == "4") $msg = "No se ha iniciado sesion, identificate primero";
        }

        //widgets include
        include("../../widgets/web/header-pt1.php");
    ?>`

    <link rel="stylesheet" type="text/css" href="../../css/general/logIn.css">
    <link rel="stylesheet" type="text/css" href="../../css/general/footer.css">
    <title>Log in </title>

    <?php
        include("../../widgets/web/header-pt2.php");
        include("../../widgets/web/navbar-return.php");
        include("../../widgets/web/logIn.php");
        include("../../widgets/web/end-file.php");

        if($msg!=""){
            echo "<script type=\"text/javascript\">my_alert(".$msg.");</script>";
        }
    ?>