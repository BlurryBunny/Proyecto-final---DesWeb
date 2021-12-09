<?php
    if(!isset($_SESSION["idU"]) ){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }
    if($_SESSION["idU"] == "" ){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    // $rol_user = get_user_rol($_SESSION["idU"]);

    // if($rol_user=="Administrador"){
    //     header("location:".$ruta."pages/admin/dashboard.php");//no se ha iniciado sesion todavia
    // }

    $c = connectDB();
    $qry = "select * from users where id_user=" .$_SESSION["idU"];
    $rs =mysqli_query($c,$qry);
    $info_user = mysqli_fetch_array($rs);
    if(!$info_user){
        header("location:".$ruta."pages/web/mapa.php?editUser=notRegi");//no se ha iniciado sesion todavia
    }

?>
<form action='../../DB/updateUser.php' enctype='multipart/form-data' class='form-post' method='post'  >
    <?php
    echo "<input type='hidden' value=". $_SESSION["idU"].     " name='txtIdUser'>";
    echo "<input type='hidden' value='General' name='txtRol'>";
    ?>
    <section class="container-fluid " id="container-all-page">
        <div class="row" id="header-page">
            <div class="col-1"></div>
            <div class="col-1">
                <a href="mapa.php" id="arrow-back"><i class='bx bx-arrow-back'></i></a>
            </div>
            <div class="col-3"></div>
            <div class="col-7">
                <h2>Modificar perfil de usuario</h2>
            </div>
        </div>
        <div class="row" id="container-content-user">
            <div class="col-1"></div>
            <div class="col-3">
                <div class="container justify-content-between pt-4"  >
                    <!-- show the photo -->
                    <div class="row " id="container-img-user"> 
                        <?php

                        if($info_user["type_photo"]!="" && $info_user["photo"]!=""){
                            echo " <img class='img-thumbnail rounded' width=200 id='postPhoto' src='../general/show-photo-user.php?idUser=".$info_user["id_user"]."' alt='".$info_user['name']."-photo'/>";
                        }else{
                            echo "<i class='bx bx-user-circle' id='img-user' ></i>";
                        }
                        ?>
                    </div>
                    <div class="row">
                    <?php
                        
                        // si existe : div col-3 con imagen | div col-1 separacion | div col-2 con boton para cambiar
                        // si no : div col-6 con form para agregar imagen
                        if($info_user["type_photo"]!="" && $info_user["photo"]!="" ){
                            //para div con imagen se manda a llamar foto para cargar img
                            echo"
                                <div class='pb-5 pl-5 pr-5' >
                                    <label for='formFile' class='form-label' id='title-txt'>Cambiar foto</label>
                                    <input class='form-control' type='file' id='input-txt-user' name='profilePhoto'> 
                                </div>
                                ";
                        }else{
                            echo"
                                <div class='pb-5 pl-5 pr-5' >
                                    <label for='formFile' class='form-label' id='title-txt'>Elegir foto</label>
                                    <input class='form-control' type='file' id='input-txt-user' name='profilePhoto'>
                                </div>
                                ";
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="container pt-5" >

                    <div class="row pl-5 pt-3">
                        <h2 id ="title-txt" >Tu email registrado</h2>
                    </div>
                    <div class="row ml-2 pl-5">
                        <?php
                            echo "<input type='text' name='txtEmail' id='input-txt-user' class='form-control' placeholder='user@user.com' aria-label='Titulo' aria-describedby='basic-addon1' value='".$info_user["email"]. "'>";
                        ?>
                    </div>
                    <div class="row mt-5" id="row-fil">
                        <h3>|</h3>
                    </div>
                    <div class="row pl-5">
                        <h2 id ="title-txt">Nombre de usuario</h2>
                    </div>
                    <div class="row pl-5">
                        <?php
                            echo "<input type='text' name='txtName' id='input-txt-user' class='form-control' placeholder='ulises123' aria-label='Titulo' aria-describedby='basic-addon1' value='".$info_user["name"]. "'>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="container pt-5">
                    <div class="row pl-5 pt-3 ">
                            <h2 id ="title-txt" >Contraseña</h2>
                        </div>
                        <div class="row ml-2 pl-5">
                            <?php
                                echo "<input type='text' name='txtPassword' id='input-txt-user' class='form-control' placeholder='micontraseña123' aria-label='Titulo' aria-describedby='basic-addon1' value='".$info_user["password"]. "'>";
                            ?>
                        </div>
                        <div class="row mt-5" id="row-fil">
                        <h3>|</h3>
                    </div>
                        <div class="row pl-5">
                            <h2 id ="title-txt">Confirma contraseña</h2>
                        </div>
                        <div class="row pl-5 pb-5">
                            <?php
                                echo "<input type='text' name='txtRePassword' id='input-txt-user' class='form-control' placeholder='micontraseña123' aria-label='Titulo' aria-describedby='basic-addon1' value='".$info_user["password"]. "'>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>


        </div> 
        
        <div class="row pt-5">
            <div class="col-3"></div>
            
            <div class="col-2">
                <?php
                echo   "<a href='modificarUsuario.php' id='btn-Cancelar' class='btn btn-info' role='button'>Cancelar</a>";
                ?>
            </div>
            <div class="col-2"></div>

            <div class="col-2">
                <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Actualizar' >
            </div>
            <div class="col-3"></div>
        </div>
</form>

<form action='modificarUsuario.php' enctype='multipart/form-data' class='form-post' method='post'>

        <div class="row pt-5" id="container-content-user">
            <div class="col-1"></div>
            <div class="col-3">
                <h2 id ="title-txt">Mis acciones</h2>
            </div>

            <div class="col-2"></div>
            <div class="col-1">
                <h2 id ="title-txt">Filtro</h2>
            </div>
            
            <div class="col-3">
            <select class="form-select form-select-lg mb-3" id="typePost" name="typePost" aria-label=".form-select-lg example">
                      <?php
                        if(isset($_POST["typePost"]) && $_POST["typePost"]!=""){
                            if($_POST["typePost"] == "Comentarios"){
                                echo "
                                <option  selected value='Comentarios'>Comentarios</option>
                                <option  value='Publicaciones'>Publicaciones</option>";
                            }else if($_POST["typePost"] == "Publicaciones"){
                                echo "
                                <option  value='Comentarios'>Comentarios</option>
                                <option  selected value='Publicaciones'>Publicaciones</option>";
                            }else{
                                echo "<option selected disabled>...</option>
                                <option  value='Comentarios'>Comentarios</option>
                                <option  value='Publicaciones'>Publicaciones</option>";
                            }
                        }else{
                            echo "<option selected disabled>...</option>
                            <option  value='Comentarios'>Comentarios</option>
                            <option  value='Publicaciones'>Publicaciones</option>";
                        }
                      ?>
                        
                    </select>
            </div>
            <div class="col-1">
                <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Ver' >  
            </div>
            <div class="col-1"></div>
        </div>
</form>
        <div class="row mt-5"  id='container-actions'>
            <?php
             echo "
             <div class='row pt-2' id='row-body'>
                     
                         <div class='container' >
                             <div class='row'>
                                 
                                 <div class='col-12' >
 
                                    
                                         <ul class='comment-list'>";
                                             
                                             
                                                $c = connectDB();
                                                $qry = "select * from posts where id_user=".$_SESSION["idU"];
                                                if(isset($_POST["typePost"]) && $_POST["typePost"]!=""){
                                                    if($_POST["typePost"] == "Publicaciones"){
                                                        $qry = "select * from posts where id_user=".$_SESSION["idU"];
                                                    }else if($_POST["typePost"] == "Comentarios"){
                                                        $qry = "select * from comments where id_user=".$_SESSION["idU"];
                                                    }
                                                }
                                                $res = mysqli_query($c, $qry);
                                                if(isset($_POST["typePost"]) && $_POST["typePost"]!=""){
                                                    if(mysqli_num_rows($res)>0){
                                                        
                                                        while($content = mysqli_fetch_array($res)){

                                                            if($_POST["typePost"] == "Comentarios"){
                                                                echo "<li class='list-group-item mt-4 pb-1' id='item-list-actions' >  
                                                                    <div class='row' id='row-content-action' >
                                                                        <div class='col-9'>
                                                                            <p>".$content['content']."</p>
                                                                        </div>
                                                                    <div class='col-2'>
                                                                            <p>".$content['date']."</p>
                                                                    </div>
                                                                    <div class='col-1'>
                                                                        <a href='../../DB/deleteComment.php?idComment=".$content["id_comment"]."&idPost=".$content["id_post"]." id='btn-action'><i class='bx bx-trash' ></i></button></a>
                                                                    </div>
                                                                                
                                                                    </div>
                                                                    </li>
                                                                    ";
                                                            }else if ($_POST["typePost"]=="Publicaciones"){
                                                                echo "<li class='list-group-item mt-4 pb-1' id='item-list-actions' >  
                                                                <div class='row' id='row-content-action'>
                                                                    <div class='col-9'>
                                                                        <p>".$content['content']."</p>
                                                                    </div>
                                                                    <div class='col-1'>
                                                                            <p>".$content['date']."</p>
                                                                    </div>
                                                                    <div class='col-1'>
                                                                            <p>".$content['type_post']."</p>
                                                                    </div>
                                                                    <div class='col-1'>
                                                                        <a href='../../DB/deletePost.php?idPost=".$content["id_post"]." id='btn-action'><i class='bx bx-trash' ></i></button></a>
                                                                    </div>
                                                                            
                                                                </div>
                                                                </li>
                                                                ";
                                                            }
                                                        }
                                                    }else{
                                                        if($_POST["typePost"] == "Comentarios"){
                                                            echo "<li class='list-group-item mt-4 pb-1' id='item-list-actions'><p>No has comentado ninguna publicacion ... </p></li>";
                                                        }else if($_POST["typePost"] == "Comentarios"){
                                                            
                                                        }
                                                    }
                                                }else{
                                                    echo "<li class='list-group-item mt-4 pb-1'><p>Selecciona una opcion </p></li>";
                                                }
 
                                                 //close conexion
                                                 mysqli_close($c);
                                             
                                             echo"
                                         </ul>
                                     
                                 </div>
                                                          
                             </div>
                         </div>
                     
             </div>";
 
            ?>
        </div>
    </section>

