<?php

    include("connectDB.php");

    session_start();
    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    $rol_user = get_user_rol($_SESSION["idU"]);
    if($rol_user != "Administrador"){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    //los datos hayan sido pasados
    if( isset($_POST['txtName']) &&
        isset($_POST['txtNameShort'])){

        if( $_POST['txtName']!=""        || 
            $_POST['txtNameShort']!=""   ){
                $qry = "insert into states(name,short_name) values('".$_POST["txtName"]."','".$_POST["txtNameShort"]."')";
                $c= connectDB();
                if(!mysqli_query($c,$qry)){
                    // echo "<h1>Error</h1>";
                    header("location:".$ruta."pages/admin/estados.php?newState=false"); // todo correcto return to ant
                }
                
                mysqli_close($c);
                // echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $imagen;
                header("location:".$ruta."pages/admin/new-edit-estado.php?newState=true"); // todo correcto return to ant
        }else{
            header("location: ".$ruta."pages/admin/new-edit-estados.php?errNewState=2");
        }
    }else{
        header("location: ".$ruta."pages/admin/new-edit-estados.php?errNewState=1");
    }

    

?>