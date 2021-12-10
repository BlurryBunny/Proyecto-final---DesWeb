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
        if(!empty($_FILES["antPhoto"]["tmp_name"])){
            
            $tipo = $_FILES["antPhoto"]["type"];

            if (    strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                    strpos($tipo, "jpg") || strpos($tipo, "png"))
            {   
                //recuperar info del archivo
                $nombre = $_FILES["antPhoto"]["name"];
            
                $nombre_temporal = $_FILES["antPhoto"]["tmp_name"];
                $tamanio = $_FILES["antPhoto"]["size"];
                
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
                $qry = "insert into ants(id_user,name,family,subfamily,alimentation,care,features,date_update,photo,type_photo) values(" .$_SESSION["idU"]. ",'$txtName','$txtFamily','$txtSubfamily','$txtAlimentation','$txtCare','$txtContent','$date','$imagen','$tipo')";
                if(!mysqli_query($c,$qry)){
                    // echo "<h1>Error</h1>";
                    header("location:".$ruta."pages/admin/hormigas.php?newAnt=false"); // todo correcto return to ant
                }
                mysqli_close($c);
                // echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $imagen;
                header("location:".$ruta."pages/admin/hormigas.php?newAnt=true"); // todo correcto return to ant
            }else{
                header("location:".$ruta."pages/admin/hormigas.php?err=3"); // lo que se adjunto no es una imagen 
            }

        }else{
            header("location:".$ruta."pages/admin/hormigas.php?err=4"); // no se adjunto ningun archivo en imagen
        }
    }else{
        header("location:".$ruta."pages/admin/hormigas.php?err=2"); // alguno o todos los campos estan vacios
    }
}else{
    header("location:".$ruta."pages/admin/hormigas.php?err=1"); // no existen datos en post
}
?>