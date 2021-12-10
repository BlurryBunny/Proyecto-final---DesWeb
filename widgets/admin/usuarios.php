<div class="container-fluid">
                
                <div class="row m-5">
                    <div class="col-xs-1 col-2"></div>
                    <div class=" col-xs-8 col-6">
                        <h2 id="only-title-page">Lista de usuarios registrados</h2>
                    </div>
                    <div class="col-xs-3 col-2">
                    <a href="new-edit-usuario.php" class="btn btn-primary" id="btn-add-post">
                            <span>Agregar</span>
                            <i class='bx bx-plus'></i>
                    </a>
                    </div>
                    <div class="col-xs-1 col-2"></div>
                </div>

                
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
                        <table class="table table-striped">
                            <thead>
                                <tr >
                                    <th ><span class="title-table">ID</span></td>
                                    <th><span class="title-table">Nombre</span></td>
                                    <th><span class="title-table">Email</span></td>
                                    <th><span class="title-table">Contraseña</span></td>
                                    <th><span class="title-table">Rol</span></td>
                                    <th><span class="title-table">Foto perfil</span></td>
                                    <th><span class="title-table">Acciones</span></td>


                                </tr>
                            </thead>

                            <tbody>
                               
                                <?php
                                    $c = connectDB();
                                    $qry = "select * from users";
                                    $rs = mysqli_query($c,$qry);
                                    //consulta hecha: puede o no haber datos
                                    if(mysqli_num_rows($rs)>0){ // existe por lo menos un dato
                                        
                                        while($datos = mysqli_fetch_array($rs)){
                                            echo "<tr>"; //inicia row
                                            
                                            echo "<td><span class='title-table'>".$datos["id_user"]."</span></td>";

                                            // poner inputs para modificar desde aqui
                                            
                                            if($datos["id_user"]!=""){
                                                echo "<form action='../../DB/updateUser.php' method = 'post'>"; //form para cada usuario

                                                echo "<input type='hidden' value=". $datos["id_user"].   " name='txtIdUser'>";
                                                echo "<td><input type='text' name='txtName' id='txtName' class='form-control' placeholder='nombre usuario' aria-label='Titulo' aria-describedby='basic-addon1'value= '".$datos["name"]. "'></td>";
                                                echo "<td><input type='text' name='txtEmail' id='txtEmail' class='form-control' placeholder='user@user.com' aria-label='Titulo' aria-describedby='basic-addon1'value= '".$datos["email"]. "'></td>";
                                                echo "<td><input type='text' name='txtPassword' id='txtPassword' class='form-control' placeholder='1234' aria-label='Titulo' aria-describedby='basic-addon1'value= '".$datos["password"]. "'></td>";

                                                if($datos["rol"]!=""){
                                                    echo "<td>";
                                                    echo "<select class='form-select form-select-lg mb-3' id='txtRol' name='txtRol' aria-label='.form-select-lg example'>";
                                                    if($datos["rol"] == "General"){
                                                        echo "
                                                        <option selected value='General'>General</option>
                                                        <option  value='Administrador'>Administrador</option>";
                                                    }else if($datos["rol"] == "Administrador"){
                                                        echo "
                                                        <option value='General'>General</option>
                                                        <option selected value='Administrador'>Administrador</option>";
                                                    }else{
                                                        echo "<option selected disabled>Rol</option>
                                                        <option value='General'>General</option>
                                                        <option value='Administrador'>Administrador</option>";
                                                    }

                                                    echo "</select>";
                                                }else{
                                                    echo "<option selected disabled>Rol</option>
                                                    <option value='General'>General</option>
                                                    <option value='Administrador'>Administrador</option>";
                                                }
                                                echo "</td>";

                                                echo "<div style='display:flex; justify-content:center;'><td >";
                                                if($datos["photo"]!="" && $datos["type_photo"]!=""){
                                                    echo " <div class = 'container-img' style= 'height:100px; width:100px; background-image :url(../general/show-photo-user.php?idUser=".$datos["id_user"]."); background-size:cover; background-position:center center; '>
                                                    </div>";
                                                }else{
                                                    echo " <div class = 'container-img' style= 'height:100px; width:100px; background-image :url(../../assets/imgs/user.png); background-size:cover; background-position:center center; align-items:center'>
                                                    </div>";
                                                }
                                                echo "</td></div>";
                                                
                                                echo "<td>
                                                        <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Actualizar' >
                                                        <a href='../../DB/deleteUser.php?idUser=".$datos["id_user"]."' class='btn-action'><i class='bx bx-trash' ></i></a>
                                                        </td>";
                                                
                                                echo "</form>";
                                            }else{
                                                echo "<td>No existe usuario</td>";
                                            }

                                            
                                           
                                            echo "</tr>";
                                            
                                        }
                                        
                                    }else{
                                        echo "  <tr>
                                                <td><span class='title-table'>No se han registrado usuarios todavia</span></td>
                                                </tr>";
                                    }

                                    mysqli_close($c);
                                ?>

                               
                            </tbody>
                        </table>
                    </div>

                    <div class="col-1"></div>
                </div>
            </div>

        </section>