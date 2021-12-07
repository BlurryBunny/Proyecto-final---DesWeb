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
if( isset($_POST['typePost'])   &&
isset($_POST['txtTitle'])   &&
isset($_POST['txtIdPost']) &&
isset($_POST['txtContent'])
){

//data is not empty?
if( $_POST['typePost']!=""      &&
$_POST['txtTitle']!=""          &&  
$_POST['txtIdPost']!=""         &&       
$_POST['txtContent']!=""
){

    //photo is not empty?
    //we need first to add the photo ant
    //verificar cargado del archivo

    extract($_POST); //extract variables for easy form to qry

    $date = date("Y/m/d"); // we need to save the date just in case

    if(!empty($_FILES["postPhoto"]["tmp_name"])){
        
        $tipo = $_FILES["postPhoto"]["type"];

        if (    strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                strpos($tipo, "jpg") || strpos($tipo, "png"))
        {   
            //recuperar info del archivo
            $nombre = $_FILES["postPhoto"]["name"];
        
            $nombre_temporal = $_FILES["postPhoto"]["tmp_name"];
            $tamanio = $_FILES["postPhoto"]["size"];
            
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
            $qry =  "Update posts set id_user=". $_SESSION["idU"].",title='".$txtTitle. "' ,content='" .$txtContent. "' ,date='".$date."' ,type_post='".$typePost."' ,photo='".$imagen."' ,type_photo='".$tipo."' where id_post=".$txtIdPost;        
        }else{
            header("location:".$ruta."pages/admin/publicaciones.php?err=3"); // lo que se adjunto no es una imagen 
        }

    }else{
        //!important qry sin imagen 
        $qry =  "Update posts set id_user=". $_SESSION["idU"].",title='".$txtTitle. "' ,content='" .$txtContent. "' ,date='".$date."' ,type_post='".$typePost."' where id_post=".$txtIdPost;        
    }

    //We need to add everything to new ant
    
    $c= connectDB();
    
    //agregar la imagen
    if(!mysqli_query($c,$qry)){
        echo "<h1>Error</h1>";
         header("location:".$ruta."pages/admin/publicaciones.php?updPost=false"); // falla en consulta
    }
    mysqli_close($c);
    header("location:".$ruta."pages/admin/publicaciones.php?updPost=true"); // todo correcto return to ant

    
}else{
    header("location:".$ruta."pages/admin/publicaciones.php?err=2"); // alguno o todos los campos estan vacios
}
}else{
header("location:".$ruta."pages/admin/publicaciones.php?err=1"); // no existen datos en post
}
?>