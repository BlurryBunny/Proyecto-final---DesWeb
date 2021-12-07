<?php
    session_start();
    include("connectDB.php");

    //autentificacion y autorizacion

    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    $rol_user = get_user_rol($_SESSION["idU"]);
    if($rol_user != "Administrador"){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    
//data exits?
if( isset($_POST["txtName"])            &&
isset($_POST["txtNameShort"])           &&
isset($_POST["txtIdState"])        
){

    //data is not empty?
    if( $_POST["txtName"]           != "" &&
        $_POST["txtNameShort"]         != "" &&
        $_POST["txtIdState"]        !=""
    ){

        $c = connectDB();
        $qry = "Update states set name = '".$_POST["txtName"]."' ,short_name='".$_POST["txtNameShort"]."' where id_state=" .$_POST["txtIdState"];
        if(!mysqli_query($c,$qry)){
            header("location:".$ruta."pages/admin/estados.php?updState=false"); // se registraron los cambios
        }
        mysqli_close($c);
        header("location:".$ruta."pages/admin/estados.php?updState=true"); // se registraron los cambios
    }else{
        header("location:".$ruta."pages/admin/estados.php?err=2"); // falla en consulta
    }
}else{
    header("location:".$ruta."pages/admin/estados.php?err=1"); // falla en consulta
}    
?>