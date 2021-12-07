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

                $state_exist = false;
                
                //hacer la comparacion
                $c= connectDB();
                $qry = "select * from states";
                $rs = mysqli_query($c,$qry);
                
                //no se puede repetir hormiga
                if(mysqli_num_rows($rs)>0){
                    while($data = mysqli_fetch_array($rs)){
                        if($data["name"] == $_POST["txtName"] && $data["short_name"] == $_POST["txtNameShort"]){
                            $state_exist = true;
                        }
                    }
                }

                if(!$state_exist){
                    $qry = "insert into states(name,short_name) values('".$_POST["txtName"]."','".$_POST["txtNameShort"]."')";
                    $c= connectDB();
                    if(!mysqli_query($c,$qry)){
                        header("location:".$ruta."pages/admin/estados.php?newState=false"); // todo correcto return to ant
                    }
                    mysqli_close($c);
                    header("location:".$ruta."pages/admin/estados.php?newState=true"); // todo correcto return to ant
                }else{
                    header("location:".$ruta."pages/admin/estados.php?newState=alrExist"); // todo correcto return to ant
                }
                
        }else{
            header("location: ".$ruta."pages/admin/estados.php?err=2");
        }
    }else{
        header("location: ".$ruta."pages/admin/estados.php?err=1");
    }
?>