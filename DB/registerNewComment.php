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
    if( isset($_POST['txtIdPost']) &&
        isset($_POST['txtComentario'])){

        if( $_POST['txtIdPost']!=""        && 
            $_POST['txtComentario']!=""          ){
                
                $c= connectDB();

                $date = date("Y/m/d");
                $qry = "insert into comments(id_post,id_user,content,date) values(".$_POST['txtIdPost'].",".$_SESSION['idU'].",'".$_POST['txtComentario']."','$date')";
                $rs = mysqli_query($c,$qry);
                
                if(!mysqli_query($c,$qry)){
                    // echo "<h1>Error</h1>";
                    header("location:".$ruta."pages/admin/view-comments.php?idPost=".$_POST["txtIdPost"]."&newComment=false"); // todo correcto return to ant
                }
                mysqli_close($c);
                // echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $imagen;
                header("location:".$ruta."pages/admin/view-comments.php?idPost=".$_POST["txtIdPost"]."&newComment=true"); // todo correcto return to ant
            }else{
            header("location: ".$ruta."pages/admin/publicaciones.php?err=2");
        }
    }else{
        header("location: ".$ruta."pages/admin/publicaciones.php?err=1");
    }

    

?>