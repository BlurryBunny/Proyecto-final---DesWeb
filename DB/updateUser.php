<?php
    session_start();
    include("connectDB.php");

    //autentificacion y autorizacion

    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }



    $rol_user = get_user_rol($_SESSION["idU"]);
    // if($rol_user != "Administrador"){
    //     header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    // }
    if(isset($_POST["txtPassword"])  && isset($_POST["txtRePassword"]) ){
        if($_POST['txtPassword']  != $_POST['txtRePassword'] ){

            if($rol_user == "Administrador"){
                header("location: ".$ruta."pages/admin/usuarios.php?err=4"); //contraseñas no iguales
            }else{
                header("location: ".$ruta."pages/web/modificarUsuario.php?err=4"); //contrase;as no iguales
            }
        }
    
    }
    
    
//data exits?
if( isset($_POST["txtIdUser"])            &&
isset($_POST["txtName"])          &&
isset($_POST["txtEmail"])       &&
isset($_POST["txtPassword"])    &&
isset($_POST["txtRol"])            
// isset($_POST["txtContent"])
){

    //data is not empty?
    if( $_POST["txtIdUser"]           != "" &&
        $_POST["txtName"]         != "" &&
        $_POST["txtEmail"]      != "" &&
        $_POST["txtPassword"]   != "" &&
        $_POST["txtRol"]           != ""  
        // $_POST["txtContent"]        != "" 
    ){

        //photo is not empty?
        //we need first to add the photo ant
        //verificar cargado del archivo



        extract($_POST); //extract variables for easy form to qry

        if(!empty($_FILES["profilePhoto"]["tmp_name"])){
            
            $tipo = $_FILES["profilePhoto"]["type"];

            if (    strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                    strpos($tipo, "jpg") || strpos($tipo, "png"))
            {   
                //recuperar info del archivo
                $nombre = $_FILES["profilePhoto"]["name"];
            
                $nombre_temporal = $_FILES["profilePhoto"]["tmp_name"];
                $tamanio = $_FILES["profilePhoto"]["size"];
                
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
                $qry =  "Update users set name='".$txtName. "' ,email='" .$txtEmail. "' ,password='".$txtPassword."' ,rol='".$txtRol."' ,photo='".$imagen."' ,type_photo='".$tipo."' where id_user=".$txtIdUser;
            }else{
                if($rol_user == "Administrador"){
                    header("location:".$ruta."pages/admin/usuarios.php?err=3"); // lo que se adjunto no es una imagen 
                }else{
                    header("location: ".$ruta."pages/web/modificarUsuario.php?err=3"); //contrase;as no iguales
                }
            }

        }else{
            //!important qry sin imagen 
            $qry =  "Update users set name='".$txtName. "' ,email='" .$txtEmail. "' ,password='".$txtPassword."' ,rol='".$txtRol."' where id_user=".$txtIdUser;
        }

        //We need to add everything to new ant
        
        $c= connectDB();
        
        //agregar la imagen
        if(!mysqli_query($c,$qry)){
            // echo "<h1>Error</h1>";
            if($rol_user == "Administrador"){
                header("location:".$ruta."pages/admin/usuarios.php?updUser=false"); // falla en consulta
            }else{
                header("location: ".$ruta."pages/web/modificarUsuario.php?updUser=false"); //contrase;as no iguales
            }
        }
        mysqli_close($c);
        if($rol_user == "Administrador"){
            header("location:".$ruta."pages/admin/usuarios.php?updUser=true"); // falla en consulta
        }else{
            header("location: ".$ruta."pages/web/modificarUsuario.php?updUser=true"); //contrase;as no iguales
        }

    }else{
        if($rol_user == "Administrador"){
            header("location:".$ruta."pages/admin/usuarios.php?err=2"); // alguno o todos los campos estan vacios
        }else{
            header("location: ".$ruta."pages/web/modificarUsuario.php?err=2"); //contrase;as no iguales
        }
    }
}

if($rol_user == "Administrador"){
    header("location:".$ruta."pages/admin/usuarios.php?err=1"); // alguno o todos los campos estan vacios
}else{
    header("location: ".$ruta."pages/web/modificarUsuario.php?err=1"); //contrase;as no iguales
}
?>