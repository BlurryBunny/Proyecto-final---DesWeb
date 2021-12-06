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
if( isset($_POST["txtIdUser"])            &&
isset($_POST["txtName"])          &&
isset($_POST["txtEmail"])       &&
isset($_POST["txtContraseña"])    &&
isset($_POST["txtRol"])            
// isset($_POST["txtContent"])
){

//data is not empty?
if( $_POST["txtIdUser"]           != "" &&
    $_POST["txtName"]         != "" &&
    $_POST["txtEmail"]      != "" &&
    $_POST["txtContraseña"]   != "" &&
    $_POST["txtRol"]           != ""  &&
    // $_POST["txtContent"]        != "" 
){

    //photo is not empty?
    //we need first to add the photo ant
    //verificar cargado del archivo

    extract($_POST); //extract variables for easy form to qry

    if(!empty($_FILES["photo"]["tmp_name"])){
        
        $tipo = $_FILES["photo"]["type"];

        if (    strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                strpos($tipo, "jpg") || strpos($tipo, "png"))
        {   
            //recuperar info del archivo
            $nombre = $_FILES["photo"]["name"];
        
            $nombre_temporal = $_FILES["photo"]["tmp_name"];
            $tamanio = $_FILES["photo"]["size"];
            
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
            $qry =  "Update users set name='".$txtName. "' ,email='" .$txtEmail. "' ,password='".$txtContraseña."' ,rol='".$txtRol."' ,photo='".$imagen."' ,type_photo='".$tipo."' where id_user=".$txtIdUser;
        }else{
            header("location:".$ruta."pages/admin/new-edit-hormiga.php?errNewAnt=4"); // lo que se adjunto no es una imagen 
        }

    }else{
        //!important qry sin imagen 
        $qry =  "Update users set name='".$txtName. "' ,email='" .$txtEmail. "' ,password='".$txtContraseña."' ,rol='".$txtRol."' where id_user=".$txtIdUser;
    }

    //We need to add everything to new ant
    
    $c= connectDB();
    
    //agregar la imagen
    if(!mysqli_query($c,$qry)){
        echo "<h1>Error</h1>";
         header("location:".$ruta."pages/admin/usuarios.php?updUser=false&idAnt=".$txtIdAnt); // falla en consulta
    }
    mysqli_close($c);
    header("location:".$ruta."pages/admin/usuarios.php?updUser=true"); // todo correcto return to ant

    
}else{
    header("location:".$ruta."pages/admin/usuarios.php?err=2"); // alguno o todos los campos estan vacios
}
}else{
header("location:".$ruta."pages/admin/usuarios.php?err=1"); // no existen datos en post
}
?>