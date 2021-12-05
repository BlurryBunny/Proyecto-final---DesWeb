<section class="container-fluid" id="container-all-page">
            <div class="row" id="header-page">
                <div class="col-1"></div>
                <div class="col-1">
                    <a href="publicaciones.php" id="arrow-back"><i class='bx bx-arrow-back'></i></a>
                </div>
                <div class="col-3"></div>
                <div class="col-7">
                    <h2>Nueva publicacion</h2>
                </div>
            </div>

            <!-- dependiendo si idAnt existe o no -->
            <?php
                // significa que se va a modificar un post
                //validacion y verificacion
                if(isset($_GET["idPost"]) && $_GET["idPost"]!="" && isset($_GET["typePost"]) && $_GET["typePost"]!=""){

                    //establecer la conexión a la DB
                    $conn = connectDB();

                    //crear la consulta a la SQL a la DB
                    $consulta = "select * from posts where id_post= ".$_GET["idPost"];

                    // ejecuta una consulta en la DB
                    $rs = mysqli_query($conn, $consulta);

                    if(mysqli_num_rows($rs)>0){
                        $data = mysqli_fetch_array($rs);
                    }

                    //close conexion
                    mysqli_close($conn);

                    
                    //in data we have
                    // id_post          we need to do another qry
                    // id_user         we need to do another qry
                    // title
                    // family
                    // content
                    // photo
                    // type_photo
                    // date
                    // type_post
                    echo " <form action='../../DB/updatePost.php' enctype='multipart/form-data' class='form-post' method='post' >";
                    echo "<input type='hidden' value=". $_SESSION["idU"].     " name='txtIdUser'>";
                    echo "<input type='hidden' value=". $data["id_post"].   " name='txtIdPost'>";
                    echo "<input type='hidden' value=". $data["type_post"].   " name='typePost'>";
                }else{
                    echo " <form action='../../DB/registerNewPost.php' enctype='multipart/form-data' class='form-post' method='post' >";
                }
            ?>
                <div class="row mt-3">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="container-fluid" id="container-card-form">
                            <div class="row" id="separation"></div>

                            <div class="row m-4">
                                <div class="col-3"></div>

                                <div class=" col-3">
                                    <h2 id="only-title-page">Publicacion para </h2>
                                </div>

                                <div class="col-3">
                                    <select class="form-select form-select-lg mb-3" id="typePost" name="typePost" aria-label=".form-select-lg example">
                                    <?php
                                        if(isset($_POST["typePost"]) && $_POST["typePost"]!=""){
                                            if($_POST["typePost"] == "Foro"){
                                                echo "
                                                <option  selected value='Foro'>Foro</option>
                                                <option  value='Cuidados basicos'>Cuidados basicos</option>";
                                            }else if($_POST["typePost"] == "Cuidados basicos"){
                                                echo "
                                                <option  value='Foro'>Foro</option>
                                                <option selected value='Cuidados basicos'>Cuidados basicos</option>";
                                            }else{
                                                echo "<option selected disabled>Sección</option>
                                                <option value='Foro'>Foro</option>
                                                <option value='Cuidados basicos'>Cuidados basicos</option>";
                                            }
                                        }else{
                                            echo "<option selected disabled>Sección</option>
                                            <option value='Foro'>Foro</option>
                                            <option value='Cuidados basicos'>Cuidados basicos</option>";
                                        }
                                    ?>
                                        
                                    </select>
                                </div>

                                <div class="col-3"></div>
                            </div>

                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <h2>Titulo de publicacion</h2> 
                                </div>
                                <div class="col-1"></div>
                                
                            </div>
                            <div class="row mt-2" id="#row-form-content">
                                <div class="col-1"></div>
                                <div class="col-10">
                                <div class="input-group">
                                        <?php
                                            if(isset($_GET["idPost"]) && $_GET["idPost"]!=""){
                                                echo "<input type='text' name='txtTitle' id='txtTitle' class='form-control' placeholder='titulo de post' aria-label='Titulo' aria-describedby='basic-addon1' value='".$data["title"]. "'>";
                                            }else{
                                                echo "<input type='text' name='txtTitle' id='txtTitle' class='form-control' placeholder='titulo de post' aria-label='Titulo' aria-describedby='basic-addon1'>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                
                            </div>

            
                               

                            <div class="row mt-2">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <h2>¿Que desea compartir?</h2>                                
                                </div>
                                <div class="col-1"></div>
                                
                            </div>

                            <div class="row mt-2">
                                <div class="col-1"></div>
                                <div class="col-10 ">
                                    <?php
                                        if(isset($_GET["idPost"]) && $_GET["idPost"]!=""){
                                            echo "<textarea name='txtContent' id='txtContent' class='form-control' aria-label='With textarea' placeholder='Una vez me encontre a ...'>".$data["content"]."</textarea>";
                                        }else{
                                            echo "<textarea name='txtContent' id='txtContent' class='form-control' aria-label='With textarea' placeholder='Una vez me encontre a ...'></textarea>";
                                        }
                                    ?>
                                </div>
                                <div class="col-1"></div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-3"></div>
                                
                                <?php
                                    // si existe : div col-3 con imagen | div col-1 separacion | div col-2 con boton para cambiar
                                    // si no : div col-6 con form para agregar imagen
                                    if(isset($_GET["idPost"]) && $_GET["idPost"]!=""){

                                        //para div con imagen se manda a llamar foto para cargar img
                                        echo"<div class='col-3'>
                                                    <label for='formFile' class='form-label'>Fotografia actual</label>
                                                    <img class='img-thumbnail rounded' width=200 id='postPhoto' src='../general/show-photo-post.php?idPost=".$_GET["idPost"]."' alt='".$data['title']."/>
                                                
                                            </div>
                                            <div class='col-1'></div>
                                            <div class='col-3 d-flex align-items-center'>
                                                <div class='mb-3'>
                                                    <label for='formFile' class='form-label'>Cambiar fotografia</label>
                                                    <input class='form-control' type='file' id='postPhoto' name='postPhoto'> 
                                                </div>
                                            </div>
                                            
                                            ";
                                    }else{
                                        echo"<div class='col-6'>
                                                <div class='mb-3'>
                                                    <label for='formFile' class='form-label'>Elegir fotografia para posts</label>
                                                    <input class='form-control' type='file' id='postPhoto' name='postPhoto'>
                                                </div>
                                            </div>";
                                    }
                                ?>
                                
                                    
                                <
                                <div class="col-3"></div>
                            </div>
                            <div class="row mt-5" id="separation"></div>

                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <?php
                            //if we have values we need to return to the page ants when we click to cancel
                           if(isset($_GET["idPost"]) && $_GET["idPost"]!=""){
                                echo   "<a href='../../admin/hormigas.php' id='btn-Cancelar' class='btn btn-info' role='button'>Cancelar</a>";
                           }else{
                                echo "<input type='reset' id='btn-Cancelar' class='btn btn-primary' value='Cancelar'> <br>";
                           }
                        ?>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2">
                        <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Publicar' >
                    </div>
                    <div class="col-2 mt-5"></div>
                </div>
                <div class="row mt-5"></div>
            </form>
        </section>

