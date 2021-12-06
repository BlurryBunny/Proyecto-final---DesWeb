<?php
                
    //establecer la conexión a la DB
    $conn = connectDB();

     //crear la consulta a la SQL a la DB
     $consulta = "select * from posts where id_post= ".$_GET["idPost"];

    // ejecuta una consulta en la DB
    $rs = mysqli_query($conn, $consulta);

    if(mysqli_num_rows($rs)>0){
        $info_post = mysqli_fetch_array($rs);
    }

    //close conexion
    mysqli_close($conn);

?>

<div class="container-fluid" id="container-all-page">
            <!-- Header regresar a pagina  -->
            <div class="row" id="header-page">
                <div class="col-1"></div>
                <div class="col-1">
                    <a href="publicaciones.php" id="arrow-back"><i class='bx bx-arrow-back'></i></a>
                </div>
                <div class="col-3"></div>
                <div class="col-7">
                    <h2>Comentarios de publicacion</h2>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-1"></div>

                <!-- Separacion entre ventana izquierda y derecha -->
                <div class="col-10">
                    <!-- Contenedor para ver publicacion -->
                    <div class="container-fluid" id="prueba">
                        <div class="row">
                           
                            <!-- Contenido de texto -->
                            <div class="col-8" id="prueba-col">

                                <h1 class="display-4 text-capitalize"><?php
                                echo $info_post["title"];
                                ?></h1>

                                <p class="mt-2"><?php
                                echo $info_post["content"];
                                ?></p>

                                <span class="mt-2"> <?php
                                echo $info_post["date"];
                                ?></span>
                            </div>

                            <div class="col-1"></div>
                            
                            <!-- Contenido de imagen -->
                            <div class="col-3" id="prueba-col">
                            <?php
                             echo "<img  width=100% id='postPhoto' src='../general/show-photo-post.php?idPost=".$info_post["id_post"]."' alt='".$info_post['title']."'>";
                            ?>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                <div class="col-1"></div>

                <!-- Separacion entre ventana izquierda y derecha -->
                <div class="col-10">
                    <!-- Contenedor para ver publicacion -->
                    <div class="container-fluid" id="prueba">
                        <div class="row">
                            
                            <!-- Contenido de texto -->
                            <div class="col-12" id="prueba-col">

                                <!-- poner todos los comentarios -->
                                <div class="container-fluid" id="container-comments">
                                    <ul class = "list-comments">
                                    <?php
                                        $c = connectDB();
                                        $qry = "select * from comments where id_post=".$info_post["id_post"];
                                        $rs = mysqli_query($c, $qry);

                                        if(mysqli_num_rows($rs)>0){
                                            while($comment_for_post = mysqli_fetch_array($rs)){
                                                echo "<li>  
                                                        <div class='row mt-2'>
                                                            <div class='col-10'>
                                                                <p>".$comment_for_post["content"]."</p>
                                                            </div>
                                                            <div class='col-1'>
                                                                <p>".$comment_for_post["date"]."</p>
                                                            </div>
                                                            <div class='col-1'>
                                                            <a href='../../DB/deleteComment.php?idComment=".$comment_for_post["id_comment"]."&idPost=".$info_post["id_post"]."' class='btn-action'><i class='bx bx-trash' ></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                ";
                                            }
                                        }else{
                                            echo "<li><h1>No se hay comentarios todavia ... </h1></li>";
                                        }

                                        //close conexion
                                        mysqli_close($c);
                                    ?>
                                    </ul>
                                </div>


                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="col-1"></div>
            </div>

            
            <!-- Nuevo comentario de admin -->
            <form action='../../DB/registerNewComment.php' enctype='multipart/form-data' class='form-post' method='post'>
            <?php    
            echo "<input type='hidden' value=". $_GET["idPost"].   " name='txtIdPost'>";
            ?>    
            <!-- <input type='hidden' value=". $data["type_post"].   " name='typePost'>; -->
            <div class="row mt-5">
                
                <div class="col-1"></div>
                <div class="col-8">
                     <textarea name='txtComentario' id='txtComentario' class='form-control' aria-label='With textarea' placeholder='¿Que opinas?'></textarea>                    
                </div>
                <div class="col-2">
                    <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Comentar' >
                </div>
                <div class="col-1"></div>
                    
            </div>

            <!-- Separacion -->
            <div class="row mt-5"></div>
            </form>
                
        </div>    
</div>

