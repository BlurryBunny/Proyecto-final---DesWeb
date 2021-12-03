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
isset($_POST["txtFamily"])          &&
isset($_POST["txtSubfamily"])       &&
isset($_POST["txtAlimentation"])    &&
isset($_POST["txtCare"])            &&
isset($_POST["txtContent"])
){

//data is not empty?
if( $_POST["txtName"]           != "" &&
    $_POST["txtFamily"]         != "" &&
    $_POST["txtSubfamily"]      != "" &&
    $_POST["txtAlimentation"]   != "" &&
    $_POST["txtCare"]           != ""  &&
    $_POST["txtContent"]        != "" 
){

    //photo is not empty?
    //we need first to add the photo ant
    //verificar cargado del archivo

    extract($_POST); //extract variables for easy form to qry

    $date = date("Y/m/d"); // we need to save the date just in case

    if(!empty($_FILES["antPhoto"]["tmp_name"])){
        
        $tipo = $_FILES["antPhoto"]["type"];

        if (    strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                strpos($tipo, "jpg") || strpos($tipo, "png"))
        {   
            //recuperar info del archivo
            $nombre = $_FILES["antPhoto"]["name"];
        
            $nombre_temporal = $_FILES["antPhoto"]["tmp_name"];
            $tamanio = $_FILES["antPhoto"]["size"];
            
            $titulo = $txtName;

            //recuperar el contenido del archivo
            $fp = fopen($nombre_temporal, "r");
            $imagen = fread($fp,$tamanio);
            fclose($fp);

            //transformar los caracteres especiales
            $imagen = addslashes($imagen);

            //we have the file ready to save it
            
            // Nota, te quedaste insertando la imagen que ya no tiene llave, una vez que la llave esta guardada 

            //!important qry con imagen agregada
            $qry =  "Update hormigas set id_user=". $txtIdUser.",name='".$txtName. "' ,family='" .$txtFamily. "' ,subfamily='".$txtSubfamily."' ,alimentation='".$txtAlimentation."' ,care='".$txtCare."' ,features='".$txtContent."' ,date_update='".$date. "' ,photo_ant='".$imagen."' ,photo_type='".$tipo."' where id_ant='".$txtIdAnt."'";        
        }else{
            header("location:".$ruta."pages/admin/new-edit-hormiga.php?errNewAnt=4"); // lo que se adjunto no es una imagen 
        }

    }else{
        //!important qry sin imagen 
        $qry =  "Update hormigas set id_user=". $txtIdUser." ,name='".$txtName. "' ,family='" .$txtFamily. "' ,subfamily='".$txtSubfamily."' ,alimentation='".$txtAlimentation."' ,care='".$txtCare."' ,features='".$txtContent."' ,date_update='".$date."' where id_ant=".$txtIdAnt;
    }

    //We need to add everything to new ant
    
    $c= connectDB();
    
    //agregar la imagen
    if(!mysqli_query($c,$qry)){
        echo "<h1>Error</h1>";
        // header("location:".$ruta."pages/admin/new-edit-hormiga.php?updAnt=false&idAnt=".$txtIdAnt); // falla en consulta
    }
    mysqli_close($c);
    echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $txtIdAnt ."<br> ".$txtIdUser." <br>";
    // header("location:".$ruta."pages/admin/new-edit-hormiga.php?updAnt=true"); // todo correcto return to ant

    
}else{
    header("location:".$ruta."pages/admin/new-edit-hormiga.php?errNewAnt=2"); // alguno o todos los campos estan vacios
}
}else{
header("location:".$ruta."pages/admin/new-edit-hormiga.php?errNewAnt=1"); // no existen datos en post
}
?>