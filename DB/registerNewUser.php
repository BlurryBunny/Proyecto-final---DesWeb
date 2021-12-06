<?php

    include("connectDB.php");
    session_start();

    $rol_user = "General";

    if(isset($_SESSION["idU"])){
        $rol_user = get_user_rol($_SESSION["idU"]);
        if($rol_user == "Administrador"){
            //los datos hayan sido pasados
            if(!isset($_POST['txtName']) || 
                !isset($_POST['txtPassword']) ||
                !isset($_POST['txtRePassword']) ||
                !isset($_POST['txtEmail'])){
                header("location: ".$ruta."pages/admin/usuarios.php?err=1");
            }

            if($_POST['txtName'] == "" ||  $_POST['txtPassword'] == "" || $_POST['txtRePassword'] == "" || $_POST['txtEmail'] == ""){
                header("location: ".$ruta."pages/admin/usuarios.php?err=2");
            }

            if($_POST['txtPassword'] != $_POST['txtRePassword']){
                header("location: ".$ruta."pages/admin/usuarios.php?err=3");
            }
                
        }else{
            header("location: ".$ruta."pages/web/mapa.php");
        }
    }else{
        //los datos hayan sido pasados
        if(!isset($_POST['txtName']) || 
        !isset($_POST['txtPassword']) ||
        !isset($_POST['txtRePassword']) ||
        !isset($_POST['txtEmail'])){
            header("location: ".$ruta."pages/general/signUp.php?err=1");
        }

        if($_POST['txtName'] == "" ||  $_POST['txtPassword'] == "" || $_POST['txtRePassword'] == "" || $_POST['txtEmail'] == ""){
            header("location: ".$ruta."pages/general/signUp.php?err=2");
        }
    
        if($_POST['txtPassword'] != $_POST['txtRePassword']){
            header("location: ".$ruta."pages/general/signUp.php?err=3");
        }

    }
    

    if(!isset($_POST["txtRol"]) ){
        $txtRol_insert='General';
    }else{
        if($_POST["txtRol"]!=""){
            $txtRol_insert = $_POST["txtRol"];
        }else{
            $txtRol_insert = 'General';
        }
    }

    extract($_POST);

    //crear la consulta a la SQL a la DB
    $qry = "insert into users (name, password, rol, email) value('$txtName','$txtPassword','$txtRol_insert','$txtEmail')";
    $rs  =  petitionSQL($qry);

    if($rol_user == "Administrador"){
       if($rs){
            //el usuario se ha registrado correctamente
            header("location: ".$ruta."pages/admin/usuarios.php?NewUser=true");
       }else{
           //no se pudo insertar
            header("location: ".$ruta."pages/admin/usuarios.php?NewUser=false");
       }
    }else{

        if($rs){
            //el usuario se ha registrado correctamente
            header("location: ".$ruta."pages/general/signUp.php?err=4");
        }else{
            header("location: ".$ruta."pages/general/signUp.php?err=5");
        }
    }

?>