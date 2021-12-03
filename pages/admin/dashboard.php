<?php
    session_start();
    include("../../DB/connectDB.php");

    //esta autentificado?
    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    $rol_user = get_user_rol($_SESSION["idU"]);
        if($rol_user != "Administrador"){
            header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
        }

    include("../../widgets/web/header-pt1.php");
?>

    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/admin/navbar-title.css">
    <link rel="stylesheet" href="../../css/general/map.css">
    <link rel="stylesheet" href="../../css/general/modal.css">


    <?php
        include("../../widgets/web/header-pt2.php");
        include("../../widgets/admin/navbar-pt1.php");  
    ?>

    <!-- title navabar -->
    <span class="title-page">Dashboard</span>
    </div>
    <?php
        include("../../widgets/web/map.php");
        include("../../widgets/web/modal.php");
    ?>
    
    <script src="../../js/general/polyfill.js"></script>
    <script type="text/javascript" src="../../js/general/map.js"></script>

    <?php
    include("../../widgets/web/end-file.php");
    ?>



  <script src="../../js/general/polyfill.js"></script>
  <script src="../../js/admin/navbar-admin.js"></script>
  <script type="text/javascript" src="../../js/genera/jquery.js"></script>
  <script type="text/javascript" src="../../js/general/bootstrap.min.js"></script>

</body>
</html>
