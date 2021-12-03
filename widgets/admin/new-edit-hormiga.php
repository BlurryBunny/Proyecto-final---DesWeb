<section class="container-fluid" id="container-all-page">
            <div class="row" id="header-page">
                <div class="col-1"></div>
                <div class="col-1">
                    <a href="hormigas.php" id="arrow-back"><i class='bx bx-arrow-back'></i></a>
                </div>
                <div class="col-3"></div>
                <div class="col-7">
                    <h2>Nueva hormiga</h2>
                </div>
            </div>

            <!-- dependiendo si idAnt existe o no -->
            <?php
                // significa que se va a modificar una hormiga
                //validacion y verificacion
                if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){

                    //establecer la conexión a la DB
                    $conn = connectDB();

                    //crear la consulta a la SQL a la DB
                    $consulta = "select * from ants where id_ant= ".$_GET["idAnt"];

                    // ejecuta una consulta en la DB
                    $rs = mysqli_query($conn, $consulta);

                    if(mysqli_num_rows($rs)>0){
                        $data = mysqli_fetch_array($rs);
                    }

                    //close conexion
                    mysqli_close($conn);

                    
                    //in data we have
                    // id_user          we need to do another qry
                    // id_photo         we need to do another qry
                    // name
                    // family
                    // subfamily
                    // alimentation
                    // care
                    // features
                    // date
                    echo " <form action='../../DB/updateAnt.php' enctype='multipart/form-data' class='form-post' method='post' onsubmit='return valida_Nueva_Hormiga()'>";
                    echo "<input type='hidden' value=". $_SESSION["idU"].     " name='txtIdUser'>";
                    echo "<input type='hidden' value=". $data["id_ant"].   " name='txtIdAnt'>";
                }else{
                    echo " <form action='../../DB/registerNewAnt.php' enctype='multipart/form-data' class='form-post' method='post' onsubmit='return valida_Nueva_Hormiga()'>";

                    //se va insertar una hormgia
                }
            ?>
            <!-- 
                display data in an input like 
                input<value="?php echo $fetchRow['post_title']?>">
                or
                
                $post_title = fetcharray['post_title']
                input<value="?php $post_title?>">

            -->

                <div class="row mt-3">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="container-fluid" id="container-card-form">
                            <div class="row" id="separation"></div>

                            <div class="row mt-4">
                                <h2>Nombre completo de hormiga</h2>
                            </div>
                            <div class="row" id="#row-form-content">
                                <div class="input-group mb-3">
                                    <?php
                                        if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){
                                            echo "<input type='text' name='txtName' id='txtName' class='form-control' placeholder='Solenopsis invicta' aria-label='Titulo' aria-describedby='basic-addon1'value= '".$data["name"]. "'>";
                                        }else{
                                            echo "<input type='text' name='txtName' id='txtName' class='form-control' placeholder='Solenopsis invicta' aria-label='Titulo' aria-describedby='basic-addon1'>";
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-5">
                                    <h2>Familia</h2> 
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h2>Subfamilia</h2> 
                                </div>
                                
                            </div>
                            <div class="row" id="#row-form-content">
                                <div class="col-5">
                                    <div class="input-group">
                                        <?php
                                            if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){
                                                echo "<input type='text' name='txtFamily' id='txtFamily' class='form-control' placeholder='Chrematogaster' aria-label='Titulo' aria-describedby='basic-addon1' value='>".$data["family"]. "'>";
                                            }else{
                                                echo "<input type='text' name='txtFamily' id='txtFamily' class='form-control' placeholder='Chrematogaster' aria-label='Titulo' aria-describedby='basic-addon1'>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <div class="input-group">
                                        <?php
                                            if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){
                                                echo "<input type='text' name='txtSubfamily' id='txtSubfamily' class='form-control' placeholder='invicta' aria-label='Titulo' aria-describedby='basic-addon1' value='>".$data["subfamily"]. "'>";
                                            }else{
                                                echo "<input type='text' name='txtSubfamily' id='txtSubfamily' class='form-control' placeholder='invicta' aria-label='Titulo' aria-describedby='basic-addon1'>";
                                            }
                                        ?>
                                    </div> 
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-5">
                                    <h2>Alimentacion</h2> 
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h2>Dificultad de cuidado</h2> 
                                </div>
                                
                            </div>
                            <div class="row" id="#row-form-content">
                                <div class="col-5">
                                    <select class="form-select form-select-lg mb-3" id="txtAlimentation" name="txtAlimentation" aria-label=".form-select-lg example">
                                        <?php
                                            if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){

                                                //we need to select the option in the form that match with the database
                                                if($data["alimentation"] == "Carnivora"){
                                                    echo "<option  value='Carnivora' selected>Carnivora</option>
                                                    <option value='Hervibora'>Hervibora</option>
                                                    <option value='Omnivoro'>Omnívoros</option>";

                                                }else if($data["alimentation"] == "Hervibora"){
                                                    echo "<option  value='Carnivora'>Carnivora</option>
                                                    <option value='Hervibora' selected>Hervibora</option>
                                                    <option value='Omnivoro'>Omnívoros</option>";
                                                
                                                }else{
                                                    echo "<option  value='Carnivora'>Carnivora</option>
                                                    <option value='Hervibora'>Hervibora</option>
                                                    <option value='Omnivoro' selected>Omnívoros</option>";
                                                }
                                            }else{
                                                echo "<option value='Carnivora'>Carnivora</option>
                                                <option value='Hervibora'>Hervibora</option>
                                                <option value='Omnivoro'>Omnívoros</option>";
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <select class="form-select form-select-lg mb-3" id="txtCare" name="txtCare" aria-label=".form-select-lg example">
                                        <?php
                                           if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){
                                                if($data["care"] == "Facil"){
                                                    echo "<option value='Facil' selected>Facil</option>
                                                    <option value='Normal'>Normal</option>
                                                    <option value='Dificil'>Dificil</option>
                                                    <option value='Extrema'>Extrema</option>";
                                                }else if($data["care"] == "Normal"){
                                                    echo "<option value='Facil'>Facil</option>
                                                    <option value='Normal' selected>Normal</option>
                                                    <option value='Dificil'>Dificil</option>
                                                    <option value='Extrema'>Extrema</option>";
                                                }else if($data["care"] == "Dificil"){
                                                    echo "<option value='Facil'>Facil</option>
                                                    <option value='Normal'>Normal</option>
                                                    <option value='Dificil' selected>Dificil</option>
                                                    <option value='Extrema'>Extrema</option>";
                                                }else{
                                                    echo "<option value='Facil'>Facil</option>
                                                    <option value='Normal'>Normal</option>
                                                    <option value='Dificil'>Dificil</option>
                                                    <option value='Extrema' selected>Extrema</option>";
                                                }
                                           }else{
                                                echo "<option value='Facil'>Facil</option>
                                                <option value='Normal'>Normal</option>
                                                <option value='Dificil'>Dificil</option>
                                                <option value='Extrema'>Extrema</option>";
                                           }

                                        ?>
                                        
                                    </select> 
                                </div>
                            </div>

                            <div class="row mt-2">
                                <h2>Caracteristicas de hormiga</h2>
                            </div>

                            <div class="row mt-2">
                                <div class="input-group">
                                    <?php
                                        if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){
                                            echo "<textarea name='txtContent' id='txtContent' class='form-control' aria-label='With textarea' placeholder='Una vez me encontre a ...'>".$data["features"]."</textarea>";
                                        }else{
                                            echo "<textarea name='txtContent' id='txtContent' class='form-control' aria-label='With textarea' placeholder='Una vez me encontre a ...'></textarea>";
                                        }
                                    ?>
                                        
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-3"></div>
                                
                                <?php
                                    // si existe : div col-3 con imagen | div col-1 separacion | div col-2 con boton para cambiar
                                    // si no : div col-6 con form para agregar imagen
                                    if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){

                                        //para div con imagen se manda a llamar foto para cargar img
                                        echo"<div class='col-3'>
                                                <img class='img-thumbnail rounded' width=200 id='antPhoto' src='../general/show-photo-ants.php?idAnt=".$_GET["idAnt"]."' alt='".$data['name'].">".
                                            "</div>
                                            <div class='col-1'></div>
                                            <div class='col-3 d-flex align-items-center'>
                                                    <input class='form-control' type='file' id='antPhoto' name='antPhoto'> 
                                            </div>
                                            
                                            ";
                                    }else{
                                        echo"<div class='col-6'>
                                                <div class='mb-3'>
                                                    <label for='formFile' class='form-label'>Agrega una Fotografia</label>
                                                    <input class='form-control' type='file' id='antPhoto' name='antPhoto'>
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
                <div class="row mt-2">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <?php
                            //if we have values we need to return to the page ants when we click to cancel
                           if(isset($_GET["idAnt"]) && $_GET["idAnt"]!=""){
                                echo "<a href='hormigas.php' id= 'btn-Cancelar class ='btn btn-primary' value='Cancelar'>Cancelar</a>";
                           }else{
                                echo "<input type='reset' id='btn-Cancelar' class='btn btn-primary' value='Cancelar'> <br>";
                           }
                        ?>
                        
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2">
                        <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Publicar' >
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </section>

