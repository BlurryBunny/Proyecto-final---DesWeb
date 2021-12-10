
          

            <!-- empieza contenido de pagina -->
            <div class="container-fluid">
                
            <form action='publicaciones.php' enctype='multipart/form-data' class='form-post' method='post'>
              <div class="row m-5">
                  <div class="col-2"></div>

                  <div class=" col-2">
                      <h2 id="only-title-page">Publicaciones de</h2>
                  </div>

                  <div class="col-2">
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

                    <div class=" col-2">
                        <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Ver' >
                    </div>
                    <div class="col-1"></div>

                  <div class="col-2">
                    <a href="new-edit-publicacion.php" class="btn btn-primary" id="btn-add-post">
                            <span>Agregar</span>
                            <i class='bx bx-plus'></i>
                    </a>
                    </div>
                  <div class="col-xs-1 col-2"></div>
              </div>
            </form>

              
              <div class ="row m-5">
                  <div class="col-2"></div>
                  <div class="col-1">
                      <h2>Mostrar</h2>
                  </div>

                  <div class="col-1">
                      <select name="format" id="format">
                          <option selected disabled>numero</option>
                          <option value="10">10</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                      </select>
                  </div>
                  
                  <div class="col-3"></div>
                  <div class="col-3">
                      <div id="searchbox">
                          <input type="text" placeholder="Buscar">
                          <button class="btn-search"><i class='bx bx-search-alt-2' ></i></button>
                      </div>
                  </div>
                  <div class="col-2"></div>
              </div>
          </div>


          <div class="container-fluid justify-content-center">
              <div class="row">
                  <div class="col-1"></div>

                  <div class="col-10">
                      <div class="mytable">
                      <table class="table table-striped" >
                        <thead>
                          <tr>
                              <th><span class="title-table">ID</span></td>
                              <th><span class="title-table">Titulo</span></td>
                              <th><span class="title-table">Creado por</span></td>
                              <th><span class="title-table">Fecha</span></td>
                              <th><span class="title-table">Acciones</span></td>
                          </tr>
                        </thead>
  
                        <tbody>
                                <?php

                                    
                                    if(isset($_POST["typePost"]) && $_POST["typePost"]!=""){
                                    
                                    
                                        $c = connectDB();
                                        $qry = "select * from posts";
                                        $rs = mysqli_query($c,$qry);
                                        //consulta hecha: puede o no haber datos
                                        if(mysqli_num_rows($rs)>0){ // existe por lo menos un dato
                                            
                                            while($datos = mysqli_fetch_array($rs)){
                                                if($datos["type_post"] == $_POST["typePost"]){
                                                    echo "<tr>";
                                                    echo "<td><span class='title-table'>".$datos["id_post"]."</span></td>";
                                                    echo "<td><span class='title-table'>".$datos["title"]."</span></td>";
                                                    $qry2 = "select name from users where id_user=".$datos["id_user"];
                                                    $rs_name_user = mysqli_query($c,$qry2);
                                                    if(mysqli_num_rows($rs_name_user)>0){
                                                        $datos_user = mysqli_fetch_array($rs_name_user);
                                                        echo "<td><span class='title-table'>".$datos_user["name"]."</span></td>";
                                                    }else{
                                                        echo "<td><span class='title-table'>No se encontro usuario</span></td>";

                                                    }
                                                    echo "<td><span class='title-table'>".$datos["title"]."</span></td>";
                                                    echo "<td><span class='title-table'>
                                                        <a href= 'new-edit-publicacion.php?idPost=".$datos["id_post"]."&typePost=".$datos["type_post"]."' class='btn-action'><i class='bx bx-edit' ></i></button>
                                                        <a href='../../DB/deletePost.php?idPost=".$datos["id_post"]."&typePost=".$datos["type_post"]."' class='btn-action'><i class='bx bx-trash' ></i></button>
                                                        <a href='view-comments.php?idPost=".$datos["id_post"]."&typePost=".$datos["type_post"]."' class='btn-action'><i class='bx bx-message-dots' ></i></button>
                                                        
                                                        </span></td>";
                                                    echo "</tr>";
                                                }else{
                                                    // echo "  <tr>
                                                    // <td><span class='title-table'>No hay datos en la base de datos</span></td>
                                                    // </tr>";
                                                }
                                            }
                                            
                                        }else{
                                            echo "  <tr>
                                                    <td><span class='title-table'>No hay datos en la base de datos</span></td>
                                                    </tr>";
                                        }

                                        mysqli_close($c);
                                    }else{
                                        echo "  <tr>
                                        <td><span class='title-table'>Selecciona un tipo de publicacion</span></td>
                                        </tr>";
                                    }
                                ?>
                        </tbody>
                      </table>
                      </div>
                  </div>

                  <div class="col-1"></div>
              </div>
          </div>
