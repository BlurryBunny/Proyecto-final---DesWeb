<?php
    //establecer la conexión a la DB
    $conn = connectDB();
     //crear la consulta a la SQL a la DB
     $consulta = "select * from posts where type_post='Cuidados basicos'";
    // ejecuta una consulta en la DB
    $rs = mysqli_query($conn, $consulta);
    //close conexion
    mysqli_close($conn);
?>


<div class="row " id="row-fill">
        <h1>ey</h1>
</div>
<div class="row " id="row-fill">
        <h1>ey</h1>
</div>

<div class="row  justify-content-start" id="title-row">
    <div class="col-1"></div>
    <div class="col-8" >
        <h1>Cuidados basicos</h1><br>
        
    </div>
    <div class="col-2">
        <a href="../../pages/admin/new-edit-publicacion.php" class="btn btn-primary">
            Crear post
        </a>
    </div>
    <div class="col-1"></div>
</div>


<?php
    $cont =0;
    if(mysqli_num_rows($rs)>0){
        while($info_post= mysqli_fetch_array($rs)){

            echo "<div class='row pt-5 ' id='row-body'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-1'></div>
                        <div class='col-10' id='container-content'>
                            
                                <div class='row'>
                                    <div class='col-8 pt-3 pb-3 pl-3 pr-3' id='container-post'>";
                                        
                                        echo "<h1 class='display-4 text-capitalize'>".$info_post['title']."</h1>";
                                        
                                        echo "<h4 class='mt-3'>"
                                        .$info_post['content'].
                                        "</h4>";

                                        echo"<span class='mt-3'> 
                                        ".$info_post['date']."
                                        </span>";

                                    echo "</div>
                                    <div class='col-4 align-content-center p-5'>";
                                    
                                        echo "<img  width=90%; height: 80%; id='postPhoto' src='../general/show-photo-post.php?idPost=".$info_post['id_post']."' alt='".$info_post['title']."'>";
                                        
                                    echo "</div>
                                    
                                </div>
                          
                        </div>
                    </div>
                </div>
                <div class='col-1'></div>
            </div>";

            echo "
            <div class='row pt-2' id='row-body'>
                    
                        <div class='container' >
                            <div class='row'>
                                <div class='col-1'> </div>
                                <div class='col-10' id='container-content'>

                                   
                                        <ul class='comment-list'>";
                                            
                                            
                                                $c = connectDB();
                                                $qry = "select * from comments where id_post=".$info_post['id_post'];
                                                $res = mysqli_query($c, $qry);
                                                

                                                if(mysqli_num_rows($res)>0){
                                                    while($comment_for_post = mysqli_fetch_array($res)){
                                                        
                                                        $qry2 = "select * from users where id_user=".$comment_for_post['id_user'];
                                                        $res2 = mysqli_query($c, $qry2);
                                                            if(mysqli_num_rows($res2)>0){
                                                                $info_user = mysqli_fetch_array($res2);
                                                                echo "<li class='list-group-item mt-4 pb-1' >  
                                                                <div class='row'>
                                                                    <div class='col-2'>
                                                                        <p>".$info_user['name']."</p>
                                                                    </div>
                                                                    <div class='col-8'>
                                                                        <p>".$comment_for_post['content']."</p>
                                                                    </div>
                                                                    <div class='col-2'>
                                                                        <p>".$comment_for_post['date']."</p>
                                                                    </div>
                                                                            
                                                                </div>
                                                                </li>
                                                                ";
                                                            }
                                                        }
                                                }else{
                                                        echo "<li class='list-group-item mt-4 pb-1'><p>No hay comentarios todavia ... </p></li>";
                                                }

                                                //close conexion
                                                mysqli_close($c);
                                            
                                            echo"
                                        </ul>
                                    
                                </div>
                                <div class='col-1'> </div>                            
                            </div>
                        </div>
                    
            </div>";

            echo "
            <form action='../../DB/registerNewComment.php' enctype='multipart/form-data' class='form-post' method='post'>
            <input type='hidden' value=". $info_post["id_post"]." name='txtIdPost'>
            <div class='row pt-2' id='row-body'>
                
                <div class='col-1'></div>
                <div class='col-9 container-form'>
                    <textarea name='txtComentario' id='txtComentario' class='form-control' aria-label='With textarea' placeholder='¿Que opinas?'></textarea>                    
                </div>
                <div class='col-1  ' id='form-container-btn'>
                    <input type='submit'  id='btn-Publicar' class='btn btn-primary align-middle ' value= 'Comentar' >
                </div>
                <div class='col-1'></div>
                    
            </div>
            </form>
            ";

            $cont++;
        }


    }else{
        echo"
        <div class='row-mt-5'></div>
        <div class='row-mt-5'>
            <div class='col-2'></div>
            <div class='col-8'>
            <h1>No hay post por el momento</h1></div>
            <div class='col-2'></div>
        </div>";
    }
    
?>

<div class="row pt-5" id='row-body'>
    <h1>|</h1>
</div>
<div class="row pt-5" id='row-body'>
    <h1>|</h1>
</div>