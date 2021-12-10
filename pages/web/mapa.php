<?php
    session_start();

    include("../../DB/connectDB.php");

    //verificacion 
    if(isset($_SESSION["idU"])){
        //autentificacion
        $rol_usr = get_user_rol($_SESSION["idU"]);

        if($rol_usr == "Administrador"){
            header("location:".$ruta."pages/admin/dashboard.php");
        }
    }

    include("../../widgets/web/header-pt1.php");
?>
    <title>Mapa</title>
    <!-- include the ccs that we need to use between header -->
    <link rel="stylesheet" href="../../css/general/navbar.css">
    <link rel="stylesheet" href="../../css/general/map.css">
    <link rel="stylesheet" href="../../css/general/modal.css">
    <link rel="stylesheet" href="../../css/general/footer.css">
    
<?php
    include("../../widgets/web/header-pt2.php");
?>
    <div class="container-fluid" id="container-page" >
    <?php
        include("../../widgets/web/navbar.php");
        include("../../widgets/web/map.php");
        include("../../widgets/web/footer.php");
        include("../../widgets/web/modal.php");
        include("../../widgets/web/modal-info.php");
        
    ?>
    
    <?php
        // if(isset($_GET["state"]) && $_GET["state"]!=""){
        //     echo "<div class='container myModal'>";
        //         echo "<div class='row'>";
        //             echo "<div class='col-1'></div>";
        //             echo "<div class='col-10'>";

        //             $c = connectDB();
        //             $qry_state = "select * from states where short_name='" .$_GET["state"]."'";
        //             $rs_state = mysqli_query($c,$qry_state);
        //             if(mysqli_num_rows($rs_state)>0){
        //                 $info_state = mysqli_fetch_array($rs_state);

                        
        //                 $qry = "select * from ants_in_states where id_state=" .$info_state["id_state"];
        //                 $rs = mysqli_query($c,$qry);

                        
        //                 mysqli_close($c);

        //                 if(mysqli_num_rows($rs)>0){
                            
        //                     echo "<div class= 'container'>";
        //                         echo "<div class= 'row pt-5' id= 'header-modal'>
        //                                 <div class = 'col-7'><h2>Hormigas en ".$info_state["name"]."</h2> </div>  
        //                                 <div class = 'col-3'></div>         
        //                                 <div class = 'col-2'><a href='mapa.php' class='close-button'><i class='bx bx-arrow-back'></i></a></div>
        //                         </div>
        //                         ";
        //                         echo "<div class = 'row pt-' id='content-modal'>";
                                    
        //                             echo "<ul id = 'list-ants'>";
                                    
        //                             while($ants_in_state_data = mysqli_fetch_array($rs)){
        //                                 $c = connectDB();
        //                                 $qry2 = "select * from ants where id_ant=".$ants_in_state_data["id_ant"];
        //                                 $rs2  = mysqli_query($c,$qry2);
        //                                 mysqli_close($c);
        //                                 if(mysqli_num_rows($rs2)>0){
        //                                     while($ant_data = mysqli_fetch_array($rs2)){
        //                                         echo "<li>  
        //                                                 <div class = 'row pt-3' id='item-modal'>
                                                           
                                                                
        //                                                         <div class='col-5'>
        //                                                             <img class='img-thumbnail rounded' width=200 id='postPhoto' src='../general/show-photo-ants.php?idAnt=".$ant_data["id_ant"]."' alt='".$ant_data['name']."/>
        //                                                         </div>
        //                                                         <div class='col-7'>
        //                                                             <div class='container'>
        //                                                                 <div class = 'row'>
        //                                                                     <div class='col-6'>
        //                                                                         <p>".$ant_data["family"]."</p>
        //                                                                     </div>
        //                                                                     <div class='col-6'></div>
        //                                                                         <p>".$ant_data["name"]."</p>
        //                                                                     </div> 
        //                                                                 </div>
        //                                                                 <div class = 'row'>
        //                                                                     <div class='col'>
        //                                                                         <p>".$ant_data["features"]."</p>
        //                                                                     </div>
                                                                            
        //                                                                 </div>
        //                                                             </div>  
        //                                                         </div>
                                                                
                                                            
        //                                                 </div>
        //                                             </li>
        //                                         ";
        //                                     }

        //                                 }

        //                             }
                                    
        //                             echo "</ul>";
                                    
        //                         echo "</div>";
        //                     echo "</div>";
                            
        //                 }else{
        //                     echo "<h1>No hay nada bro</h1>";
        //                 }
        //             }
                    
                    
        //             echo "</div>";
        //             echo "<div class='col-1'></div>";
        //         echo "</div>";
        //     echo "</div>";
        // }
    
    ?>
    

    </div>
<script src="../../js/general/polyfill.js"></script>
<script type="text/javascript" src="../../js/general/map.js"></script>

<?php
    include("../../widgets/web/end-file.php");
?>

