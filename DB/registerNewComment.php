<?php

    include("connectDB.php");

    session_start();
    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

     $rol_user = get_user_rol($_SESSION["idU"]);

    //los datos hayan sido pasados
    if( isset($_POST['txtIdPost']) &&
        isset($_POST['txtComentario'])){

        if( $_POST['txtIdPost']!=""        && 
            $_POST['txtComentario']!=""          ){
                
                $c= connectDB();

                $date = date("Y/m/d");
                $qry = "insert into comments(id_post,id_user,content,date) values(".$_POST['txtIdPost'].",".$_SESSION['idU'].",'".$_POST['txtComentario']."','$date')";
                
                
                if(!mysqli_query($c,$qry)){
                    // echo "<h1>Error</h1>";
                    if($rol_user == "Administrador"){
                        header("location:".$ruta."pages/admin/view-comments.php?idPost=".$_POST["txtIdPost"]."&newComment=false"); // todo correcto return to ant
                    }else{
                        if($typePost == "Foro"){
                            header("location:".$ruta."pages/web/foro.php?newComment=false");
                        }else{
                            header("location:".$ruta."pages/web/cuidadosBasicos.php?newComment=false");
                        }
                    }
                }
                mysqli_close($c);

                if($rol_user == "Administrador"){
                    header("location:".$ruta."pages/admin/view-comments.php?idPost=".$_POST["txtIdPost"]."&newComment=true"); // todo correcto return to ant
                }else{
                    if($typePost == "Foro"){
                        header("location:".$ruta."pages/web/foro.php?newComment=true");
                    }else{
                        header("location:".$ruta."pages/web/cuidadosBasicos.php?newComment=true");
                    }
                }
            }else{
                if($rol_user == "Administrador"){
                    header("location: ".$ruta."pages/admin/publicaciones.php?err=2");
                }else{
                    if($typePost == "Foro"){
                        header("location:".$ruta."pages/web/foro.php?err=2");
                    }else{
                        header("location:".$ruta."pages/web/cuidadosBasicos.php?err=2");
                    }
                }
            }
    }else{
        if($rol_user == "Administrador"){
                header("location: ".$ruta."pages/admin/publicaciones.php?err=1");
        }else{
            if($typePost == "Foro"){
                    header("location:".$ruta."pages/web/foro.php?err=1");
            }else{
                    header("location:".$ruta."pages/web/cuidadosBasicos.php?err=1");
            }
        }    
    }

    

?>