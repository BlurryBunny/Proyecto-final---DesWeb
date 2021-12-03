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
isset($_POST["txtNameShort"])         
){

    //data is not empty?
    if( $_POST["txtName"]           != "" &&
        $_POST["txtNameShort"]         != "" 
    ){

        $c = connectDB();
        $qry = "update states set name = ".$_POST["txtName"]." ,name_short=".$_POST["txtNameShort"]." where id_state=" .$_GET["idState"];
        if(!mysqli_query($c,$qry)){
            header("location:".$ruta."pages/admin/new-edit-estado.php?updState=false"); // se registraron los cambios
        }

        mysqli_close($c);
        header("location:".$ruta."pages/admin/new-edit-estado.php?updState=true"); // se registraron los cambios
    }else{

    }

    }else{
        //!important qry sin imagen 
        $qry =  "Update ants set id_user=". $txtIdUser." ,name='".$txtName. "' ,family='" .$txtFamily. "' ,subfamily='".$txtSubfamily."' ,alimentation='".$txtAlimentation."' ,care='".$txtCare."' ,features='".$txtContent."' ,date_update='".$date."' where id_ant=".$txtIdAnt;
    }

    //We need to add everything to new ant
    
    $c= connectDB();
    
    //agregar la imagen
    if(!mysqli_query($c,$qry)){
        echo "<h1>Error</h1>";
         header("location:".$ruta."pages/admin/new-edit-hormiga.php?updAnt=false&idAnt=".$txtIdAnt); // falla en consulta
    }
    mysqli_close($c);
    echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $txtIdAnt ."<br> ".$txtIdUser." <br>";
    header("location:".$ruta."pages/admin/new-edit-hormiga.php?updAnt=true"); // todo correcto return to ant

    
}else{
    header("location:".$ruta."pages/admin/new-edit-hormiga.php?errNewAnt=2"); // alguno o todos los campos estan vacios
}
}else{
header("location:".$ruta."pages/admin/new-edit-hormiga.php?errNewAnt=1"); // no existen datos en post
}
?>