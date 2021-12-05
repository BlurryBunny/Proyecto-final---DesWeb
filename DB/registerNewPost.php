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
    if( isset($_POST['typePost'])   &&
        isset($_POST['txtTitle'])   &&
        isset($_POST['txtContent'])
        ){

        if( $_POST['typePost']!=""        &&
            $_POST['txtTitle']!=""          &&         
            $_POST['txtContent']!="" ){
                
                if(!empty($_FILES["postPhoto"]["tmp_name"])){
            
                    $tipo = $_FILES["postPhoto"]["type"];
        
                    if (    strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                            strpos($tipo, "jpg") || strpos($tipo, "png"))
                    {   
                        //recuperar info del archivo
                        $nombre = $_FILES["postPhoto"]["name"];
                    
                        $nombre_temporal = $_FILES["postPhoto"]["tmp_name"];
                        $tamanio = $_FILES["postPhoto"]["size"];
                        
                        $titulo = $_POST["txtName"];
        
                        //recuperar el contenido del archivo
                        $fp = fopen($nombre_temporal, "r");
                        $imagen = fread($fp,$tamanio);
                        fclose($fp);
        
                        //transformar los caracteres especiales
                        $imagen = addslashes($imagen);
        
                        //we have the file ready to save it
                        //We need to add everything to new ant
                        extract($_POST); //extract variables for easy form to qry
                        $c= connectDB();
        
                        $date = date("Y/m/d"); // we need to save the date just in case
                        // Nota, te quedaste insertando la imagen que ya no tiene llave, una vez que la llave esta guardada 
                        $qry = "insert into posts(id_user,title,content,date,type_post,photo,type_photo) values(" .$_SESSION["idU"]. ",'$txtTitle','$txtContent','$date','$typePost','$imagen','$tipo')";
                        if(!mysqli_query($c,$qry)){
                            // echo "<h1>Error</h1>";
                            header("location:".$ruta."pages/admin/publicaciones.php?newPost=false"); // todo correcto return to ant
                        }
                        mysqli_close($c);
                        // echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $imagen;
                        header("location:".$ruta."pages/admin/publicaciones.php?newPost=5"); // todo correcto return to ant
                    }else{
                        header("location:".$ruta."pages/admin/new-edit-publicacion.php?err=4"); // lo que se adjunto no es una imagen 
                    }
        
                }else{
                    header("location:".$ruta."pages/admin/new-edit-publicacion.php?err=3"); // no se adjunto ningun archivo en imagen
                }
        }else{
            header("location: ".$ruta."pages/admin/new-edit-publicacion.php?err=2");
        }
    }else{
        header("location: ".$ruta."pages/admin/new-edit-publicacion.php?err=1");
    }

    

?>