<section class="container-fluid" id="container-all-page">
            <div class="row" id="header-page">
                <div class="col-1"></div>
                <div class="col-1">
                    <i class='bx bx-arrow-back'></i>
                </div>
                <div class="col-3"></div>
                <div class="col-7">
                    <h2>Nuevo estado</h2>
                </div>
            </div>
            <!-- dependiendo si idAnt existe o no -->
            <?php
                // significa que se va a modificar una hormiga
                //validacion y verificacion
                if(isset($_GET["idState"]) && $_GET["idState"]!=""){

                    //establecer la conexión a la DB
                    $conn = connectDB();

                    //crear la consulta a la SQL a la DB
                    $consulta = "select * from states where id_state= ".$_GET["idState"];

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
                    echo " <form action='../../DB/updateState.php' enctype='multipart/form-data' class='form-post' method='post' onsubmit='return valida_Nuevo_Estado()'>";
                    echo "<input type='hidden' value=". $_SESSION["idU"].     " name='txtIdUser'>";
                    echo "<input type='hidden' value=". $data["id_state"].   " name='txtIdState'>";
                }else{
                    echo " <form action='../../DB/registerNewState.php' enctype='multipart/form-data' class='form-post' method='post' onsubmit='return valida_Nuevo_Estado()'>";

                    //se va insertar una hormgia
                }
            ?>

            <form action="#" enctype="multipart/form-data" class="form-post" method="POST" onsubmit="return valida_Post()">
                <div class="row mt-3">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="container-fluid" id="container-card-form">
                            <div class="row" id="separation"></div>

                            <div class="row mt-4">
                                <h2>Nombre completo de estado</h2>
                            </div>
                            <div class="row" id="#row-form-content">
                                <div class="input-group mb-3">
                                    <?php
                                        if(isset($_GET["idState"]) && $_GET["idState"]!=""){
                                            echo "<input type='text' name='txtName' id='txtName' class='form-control' placeholder='Baja California' aria-label='Titulo' aria-describedby='basic-addon1'value= '".$data["name"]. "'>";
                                        }else{
                                            echo "<input type='text' name='txtName' id='txtName' class='form-control' placeholder='Baja California' aria-label='Titulo' aria-describedby='basic-addon1'>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <h2>Nombre abreviado de estado</h2> 
                            </div>
                            <div class="row" id="#row-form-content">
                                <div class="input-group">
                                    <?php
                                        if(isset($_GET["idState"]) && $_GET["idState"]!=""){
                                            echo "<input type='text' name='txtNameShort' id='txtNameShort' class='form-control' placeholder='BCS' aria-label='Titulo' aria-describedby='basic-addon1'value= '".$data["short_name"]. "'>";
                                        }else{
                                            echo "<input type='text' name='txtNameShort' id='txtNameShort' class='form-control' placeholder='BCS' aria-label='Titulo' aria-describedby='basic-addon1'>";
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="row mt-4" id="separation"></div>
                        
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <input type="reset" id="btn-Cancelar" class="btn btn-primary" value="Cancelar"> <br>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2">
                        <input type="submit"  id="btn-Publicar" class="btn btn-primary" value= "Publicar" >
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </section>