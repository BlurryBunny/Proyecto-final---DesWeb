<?php

    include("connectDB.php");

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

    extract($_POST);

    //crear la consulta a la SQL a la DB
    $qry = "insert into users (name, password, rol, email) value('$txtName','$txtPassword','General','$txtEmail')";
    $rs  =  petitionSQL($qry);

    if($rs){
        //el usuario se ha registrado correctamente
        header("location: ".$ruta."pages/general/signUp.php?err=4");
    }else{
    //     //el usuario se ha registrado correctamente
        header("location: ".$ruta."pages/general/signUp.php?err=5");
    }

?>