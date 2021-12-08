<?php
    session_start();

    include("../../DB/connectDB.php");

    //verificacion 
    if(isset($_SESSION["idU"])){
        //autentificacion
        $rol_usr = get_user_rol($_SESSION["idU"]);

        if($rol_usr == "Administrador"){
            header("location:".$ruta."pages/admin/dashboard.php");
        }
    }

    include("../../widgets/web/header-pt1.php");
?>
    <title>Mapa</title>
    <!-- include the ccs that we need to use between header -->
    <!-- <link rel="stylesheet" href="../../css/general/map.css"> -->
    <link rel="stylesheet" href="../../css/general/navbar.css">
    <link rel="stylesheet" href="../../css/web/cuidadosBasicos.css">
    <link rel="stylesheet" href="../../css/general/footer.css">
    
<?php
    include("../../widgets/web/header-pt2.php");
?>

    <?php
        include("../../widgets/web/navbar.php");
        include("../../widgets/web/foro.php");
        // include("../../widgets/web/modal.php");
        include("../../widgets/web/footer.php");
    ?>


<script src="../../js/general/polyfill.js"></script>
<script type="text/javascript" src="../../js/general/map.js"></script>

<?php
    include("../../widgets/web/end-file.php");
?>

