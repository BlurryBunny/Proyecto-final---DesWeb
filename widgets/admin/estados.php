<div class="container-fluid">
                
                <div class="row m-5">
                    <div class="col-xs-1 col-2"></div>
                    <div class=" col-xs-8 col-6">
                        <h2 id="only-title-page">Lista de estados en mapa</h2>
                    </div>
                    <div class="col-xs-3 col-2">
                    <a href="new-edit-estado.php" class="btn btn-primary" id="btn-add-post">
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
                    <div class="mytable">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><span class="title-table">ID</span></td>
                                    <th><span class="title-table">Nombre</span></td>
                                    <th><span class="title-table">Nombre corto</span></td>
                                    <th><span class="title-table">Acciones</span></td>
                                </tr>
                            </thead>

                            <tbody>
                               
                                <?php
                                    $c = connectDB();
                                    $qry = "select * from states";
                                    $rs = mysqli_query($c,$qry);
                                    //consulta hecha: puede o no haber datos
                                    if(mysqli_num_rows($rs)>0){ // existe por lo menos un dato
                                        
                                        while($datos = mysqli_fetch_array($rs)){
                                            echo "<tr>";
                                            echo "<td><span class='title-table'>".$datos["id_state"]."</span></td>";
                                            echo "<td><span class='title-table'>".$datos["name"]."</span></td>";
                                            echo "<td><span class='title-table'>".$datos["short_name"]."</span></td>";
                                            echo "<td><span class='title-table'>
                                                <a href= 'new-edit-estado.php?idState=".$datos["id_state"]."' class='btn-action'><i class='bx bx-edit' ></i></button>
                                                <a href='../../DB/deleteState.php?idState=".$datos["id_state"]."' class='btn-action'><i class='bx bx-trash' ></i></button>
                                                </span></td>";
                                            echo "</tr>";
                                        }
                                        
                                    }else{
                                        echo "  <tr>
                                                <td><span class='title-table'>No hay datos en la base de datos</span></td>
                                                </tr>";
                                    }

                                    mysqli_close($c);
                                ?>

                               
                            </tbody>
                        </table>
                    </div>
                    </div>

                    <div class="col-1"></div>
                </div>
            </div>

        </section>