<div class="container-fluid">
    <form action='../../DB/registerNewRelationStateAnt.php' enctype='multipart/form-data' class='form-post' method='post' onsubmit="return valida_Nueva_Relacion_HormigaEstado()">

    <!-- titulo -->
    
    <div class="d-flex row-flex text-center m-5">
            
            <div id="my-row-complete">
            <h2>Crear relacion de hormiga en estado</h2>
            </div>
            
            
        </div>
    <!-- contenido -->
    <!-- buttons to fill the form -->
   
    <div class ="row m-5">

        <div class="col-1"></div>
        <div class="col-2">
            <h2>Hormiga</h2>
        </div>
        <div class="col-2">
            <select class="form-select form-select-lg " id="txtIdAnt" name="txtIdAnt" aria-label=".form-select-lg example">
                <option selected disabled>mi hormiga</option>

                    <?php
                        $c = connectDB();
                        $qry = "select * from ants";
                        $rs = mysqli_query($c,$qry);
                       
                        //consulta hecha: puede o no haber datos
                        if(mysqli_num_rows($rs)>0){ // existe por lo menos un dato
                        while($datos = mysqli_fetch_array($rs)){
                           
                            echo"<option value='".$datos["id_ant"]."'>".$datos["name"]."</option>";

                        }
                                    
                        }else{
                            echo"<option value= 'null'>No hay datos</option>";
                        }
                    ?>
            </select>
        </div>
                    
                   
        <div class="col-2">
            <h2>Estado</h2>
        </div>

        <div class="col-2">
            <select class="form-select form-select-lg " id="txtIdState" name="txtIdState" aria-label=".form-select-lg example">
                <option selected disabled>mi hormiga</option>
                    <?php
                        $c = connectDB();
                        $qry = "select * from states";
                        $rs = mysqli_query($c,$qry);
                        //consulta hecha: puede o no haber datos
                        if(mysqli_num_rows($rs)>0){ // existe por lo menos un dato
                                    
                        while($datos = mysqli_fetch_array($rs)){
                            echo"<option value=".$datos["id_state"].">".$datos["name"]."</option>";
                        }
                                    
                        }else{
                            echo"<option value= 'null'>No hay datos</option>";
                        }
                    ?>

            </select>
        </div>

                    <!-- <div class="col-1"></div> -->
        <div class="col-2">
            <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Agregar' >
        </div>
        <div class="col-1"></div>
                    
    </div>
                
    </form>        
                <div class ="row m-5">
                                      
                <div class="col-4"></div>
                    <div class="col-4">
                        <div id="searchbox">
                            <input type="text" placeholder="Buscar">
                            <button class="btn-search"><i class='bx bx-search-alt-2' ></i></button>
                        </div>
                    </div>
                    <div class="col-s4"></div>
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
                                    <th><span class="title-table">Id estado</span></th>
                                    <th><span class="title-table">Estado</span></th>
                                    <th><span class="title-table">Nombre de hormiga</span></th>
                                    <th><span class="title-table">Familia | Subfamilia</span></th>
                                    <th><span class="title-table">Acciones</span></th>

                                </tr>
                            </thead>

                            <tbody>
                               
                                <?php
                                    $c = connectDB();
                                    $qry = "select * from ants_in_states";
                                    $rs = mysqli_query($c,$qry);
                                    
                                    //consulta hecha: puede o no haber datos
                                    if(mysqli_num_rows($rs)>0){ // existe por lo menos un dato
                                        $states_view = [];  //guardar id de estado
                                        
                                        
                                        while($datos_ant_states = mysqli_fetch_array($rs)){
                                            echo "<tr>";
                                    
                                            $state_visit =false;
                                            
                                            //Necesito ver si estado ya esta en la lista
                                            if(sizeof($states_view)>0){

                                                //recorro la lista
                                                for($x = 0; $x < sizeof($states_view) && $state_visit == false; $x++){
                                                    if($datos_ant_states["id_state"] == $states_view[$x]){$state_visit=true;}
                                                }
                                            }
                                            
                                            //El estado no se encuentra en la lista por lo que necesito agregarlo a la tabla
                                            if(!$state_visit){
                                                
                                                //necesito extraer la informacion
                                                $qry2= "select * from states where id_state=".$datos_ant_states["id_state"];
                                                //consulta para extraer info de estado y hormiga
                                                $rs_state = mysqli_query($c,$qry2);
                                                $datos_state = mysqli_fetch_array($rs_state);
                                                
                                                
                                                echo "<td><span class='title-table'>".$datos_state["id_state"]."</span></td>";
                                                echo "<td><span class='title-table'>".$datos_state["name"]." | ".$datos_state["short_name"]."</span></td>";
                                                        

                                                //nuevamente realizo toda la consutla
                                                $rs_newState = mysqli_query($c,$qry);
                                                // ---------------------- > inserto el nombre
                                                echo "<td>";
                                                while($datos_newState = mysqli_fetch_array($rs_newState)){
                                                        if($datos_newState["id_state"] == $datos_state["id_state"]){
                                                            $qry3= "select name from ants where id_ant=".$datos_newState["id_ant"];
                                                            $rs_ant = mysqli_query($c,$qry3);
                                                            $datos_ant = mysqli_fetch_array($rs_ant);
                                                            echo "<span class='title-table'>".$datos_ant["name"]."</span><br>";
                                                    }
                                                }
                                                echo "</td>";

                                                //nuevamente realizo toda la consutla
                                                $rs_newState = mysqli_query($c,$qry);
                                                // ---------------------- > inserto el familia y subfamilia
                                                echo "<td>";
                                                while($datos_newState = mysqli_fetch_array($rs_newState)){
                                                    if($datos_newState["id_state"] == $datos_state["id_state"]){
                                                        $qry3= "select family,subfamily from ants where id_ant=".$datos_newState["id_ant"];
                                                        $rs_ant = mysqli_query($c,$qry3);
                                                        $datos_ant = mysqli_fetch_array($rs_ant);
                                                        echo "<span class='title-table'>".$datos_ant["family"]." | ".$datos_ant["subfamily"]."</span><br>";
                                                }
                                               
                                                }
                                                echo "</td>";

                                                //nuevamente realizo toda la consutla
                                                $rs_newState = mysqli_query($c,$qry);
                                                // ---------------------- > inserto el familia y subfamilia
                                                echo "<td>";
                                                while($datos_newState = mysqli_fetch_array($rs_newState)){
                                                    if($datos_newState["id_state"] == $datos_state["id_state"]){
                                                        $qry3= "select id_ant from ants where id_ant=".$datos_newState["id_ant"];
                                                        $rs_ant = mysqli_query($c,$qry3);
                                                        $datos_ant = mysqli_fetch_array($rs_ant);
                                                        echo "<span class='title-table'>
                                                        <a href='../../DB/deleteRelationStateAnt.php?idAnt=".$datos_ant["id_ant"]."&idState=".$datos_state["id_state"]."' class='btn-action'><i class='bx bx-trash' ></i></button>
                                                        </span><br>";                                                
                                                    }
                                               
                                                }
                                                echo "</td>";


                                                

                                                $states_view[]= $datos_state["id_state"];

                                            } 
                                        echo "</tr>";
                                    }

                                        
                                    }
                                    else{
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

