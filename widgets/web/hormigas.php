<?php
    //establecer la conexión a la DB
    $conn = connectDB();
     //crear la consulta a la SQL a la DB
     $consulta = "select * from ants ";
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
        <h1>Especies de hormigas</h1><br>
    </div>
    <div class="col-2">
        <select class="form-select form-select-lg mb-3" id="filter" name="filter" aria-label=".form-select-lg example">
        <?php
            if(isset($_GET["filter"]) && $_GET["filter"]!=""){
                if($_GET["filter"] == "Familia"){
                    echo "<option selected value='Todas'>Todas</option>
                    <option selected value='Familia'>Familia</option>
                    <option value='Subfamilia'>Subfamilia</option>
                    <option value='Dificultad'>Dificultad</option>";
                }else if($_GET["filter"] == "Subfamilia"){
                    echo "<option value='Todas'>Todas</option>
                    <option value='Familia'>Familia</option>
                    <option selected value='Subfamilia'>Subfamilia</option>
                    <option value='Dificultad'>Dificultad</option>";
                }else if($_GET["filter"] == "Dificultad"){
                    echo "<option value='Todas'>Todas</option>
                    <option value='Familia'>Familia</option>
                    <option value='Subfamilia'>Subfamilia</option>
                    <option selected value='Dificultad'>Dificultad</option>";
                }else{
                    echo "<option selected value='Todas'>Todas</option>
                    <option value='Familia'>Familia</option>
                    <option value='Subfamilia'>Subfamilia</option>
                    <option value='Dificultad'>Dificultad</option>";
                }
            }else{
                echo "<option selected value='Todas'>Todas</option>
                    <option value='Familia'>Familia</option>
                    <option value='Subfamilia'>Subfamilia</option>
                    <option value='Dificultad'>Dificultad</option>";
            }
        ?>
            
        </select>
        
    </div>
    <div class="col-1"></div>
</div>


<?php
    $cont =0;
    $firstRow = 0;
    if(mysqli_num_rows($rs)>0){

        echo "
        <div class='p-5' style='margin:0 !important;'>
            <div class='d-flex align-content-center flex-wrap p-5' >";

        while($info_ant= mysqli_fetch_array($rs)){

            ?>
            <div class='col-sm-4 m-5' style='width:400px'  id='container-content'>
                Hola como estas
                <div class='row'>
                    
                        <div class="row">
                            <img  id='ant-photo' src='../general/show-photo-ants.php?idAnt=<?=$info_ant['id_ant']?>' alt='<?=$info_ant['name']?>'>
                        </div>
                    
                    
                        <div class=" d-flex row-flex ">
                            <div class="col-6">
                                <span class=' text-capitalize'><?=$info_ant['family']?></span>
                            </div>
                            <div class="col-6">
                            <span class=' pl-5 text-capitalize'> <?=$info_ant['subfamily']?></span>
                            </div>
                            
                        </div>

                        <div class=" d-flex row-flex ">
                            <div class="col-6">
                                <span class=' text-capitalize'><?=$info_ant['family']?></span>
                            </div>
                            <div class="col-6">
                            <span class=' pl-5 text-capitalize'> <?=$info_ant['subfamily']?></span>
                            </div>
                            
                        </div>
                            
                        
                    
                </div>
            </div>
        }
                
            
        
        // while($info_ant= mysqli_fetch_array($rs)){

        //     echo "<div class='row pt-5 ' id='row-body'>
        //         <div class='container'>
        //             <div class='row'>
        //                 <div class='col-1'></div>";
                        
        //                 echo "<div class='col-3' id='container-content'>
                            
        //                         <div class='row'>
        //                             <img  id='ant-photo' src='../general/show-photo-ants.php?idAnt=".$info_ant['id_ant']."' alt='".$info_ant['name']."'>
        //                         </div>";
        //                         echo"
        //                         <div class='row'>
        //                             <div class='col-10' id='container-post'>";
                                            
        //                             echo "<span class=' text-capitalize'>".$info_ant['family']."</span>";
                                    
        //                             echo"<span class='mt-3'> 
        //                             ".$info_ant['subfamily']."
        //                             </span>
                                    
        //                         </div>";

        //                         echo"
        //                         <div class='row'>
        //                             <div class='col-10' id='container-post'>";
                                            
        //                             echo "<span class=' text-capitalize'>".$info_ant['alimentation']."</span>";
                                    
        //                             echo"<span class='mt-3'> 
        //                             ".$info_ant['care']."
        //                             </span>
                                    
        //                         </div>";

        //                         echo "</div>
        //                             <div class='row'>
        //                                 <span class='mt-3'> 
        //                                 ".$info_ant['features']."
        //                                 </span>
        //                             </div>
        //                         ";
                                
                          
        //                 echo "</div>";


        //             echo "</div>
        //         </div>
        //         <div class='col-1'></div>
        //     </div>";

            

        //     $cont++;
        // }

        echo "</div>
        </div>
        ";


    }
    
?>

<div class="row pt-5" id='row-body'>
    <h1>|</h1>
</div>
<div class="row pt-5" id='row-body'>
    <h1>|</h1>
</div>

