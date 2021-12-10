<?php
$rutaReturn = 'mapa.php';
if(isset($_SESSION["idU"]) && $_SESSION["idU"]!=""){
    $rol_usr = get_user_rol($_SESSION["idU"]);
    
    
    if($rol_usr == "Administrador"){
       $rutaReturn = 'dashboard.php';
    }
}


if(isset($_GET["state"]) && $_GET["state"]!=""){
    echo "<div class='container myModal'>";
    
    //obtenemos la informacion del estado 
    $c = connectDB();
    $qry_state = "select * from states where short_name='" .$_GET["state"]."'";
    $rs_state = mysqli_query($c,$qry_state);
    if(mysqli_num_rows($rs_state)>0){
        $info_state = mysqli_fetch_array($rs_state);
        
        //insertamos el cabezal con la informacion del estado
        echo "<div class= 'row pt-5 pl-5' id= 'header-modal'>
                <div class = 'col-1'></div> 
                <div class = 'col-5'><h2>Hormigas en ".$info_state["name"]."</h2> </div>  
                <div class = 'col-3'></div>         
                <div class = 'col-2'><a href='".$rutaReturn."' id='close-button'><i class='bx bx-arrow-back'></i></a></div> 
                <div class = 'col-1'></div> 
            </div>
            ";
        //hacemos nuestra siguiente consulta
        $qry = "select * from ants_in_states where id_state=" .$info_state["id_state"];
        $rs = mysqli_query($c,$qry);
        
        mysqli_close($c);
        if(mysqli_num_rows($rs)>0){
            while($ants_in_state_data = mysqli_fetch_array($rs)){
                $c = connectDB();
                $qry2 = "select * from ants where id_ant=".$ants_in_state_data["id_ant"];
                $rs2  = mysqli_query($c,$qry2);
                mysqli_close($c);
                if(mysqli_num_rows($rs2)>0){
                    while($ant_data = mysqli_fetch_array($rs2)){
                        echo "<div class='row p-5 ' id='row-body'>
                        <div class='container' >
                            <div class='row'>
                                <div class='col-1'></div>
                                <div class='col-10' >
                                    
                                        <div class='row'>
                                            <div class='col-8 pt-3 pb-3 pl-3 pr-3' id='container-content'>";
                                                
                                                echo "<h1 class='display-4 text-capitalize'>".$ant_data['name']."</h1>";
                                                echo "<span class='mt-3' id='family-txt'>Familia: "
                                                .$ant_data['family'].
                                                "</span>";
                                                echo "<span class='mt-3' id='subfamily-txt'>Subfamilia: "
                                                .$ant_data['subfamily'].
                                                "</h4>";
                                                echo"<h4 class='mt-3 id='features-txt'> 
                                                ".$ant_data['features']."
                                                </h4>";
                                            echo "</div>
                                            <div class='col-4 align-content-center'>";
                                            
                                                echo "<div class = 'container-img' style= 'height:200px; width:200px; background-image :url(../general/show-photo-ants.php?idAnt=".$ant_data["id_ant"]."); background-size:cover; background-position:center center;'>
                                                </div>";
                                                
                                            echo "</div>
                                            
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class='col-1'></div>
                        </div>";
                    }
                }
            }
        }
        
    }
}
?>