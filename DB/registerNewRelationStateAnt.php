<?php

    include("connectDB.php");

    session_start();
    if(!isset($_SESSION["idU"])){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    $rol_user = get_user_rol($_SESSION["idU"]);
    if($rol_user != "Administrador"){
        header("location:".$ruta."pages/general/logIn.php?err=4");//no se ha iniciado sesion todavia
    }

    //los datos hayan sido pasados
    if( isset($_POST['txtIdState']) &&
        isset($_POST['txtIdAnt'])){

        if( $_POST['txtIdState']!=""        || 
            $_POST['txtIdAnt']!=""          ){
                $rel_exist = false;
                
                $c= connectDB();
                $qry = "select * from ants_in_states";
                $rs = mysqli_query($c,$qry);
                while($data = mysqli_fetch_array($rs) && $rel_exist!=true){
                    if($data["id_ant"] == $_POST["txtIdAnt"] && $data["id_state"] == $_POST["txtIdState"]){
                        $rel_exist = true;
                    }
                }

                if(!$rel_exist){
                
                    $qry = "insert into ants_in_states(id_state,id_ant) values(".$_POST["txtIdState"].",".$_POST["txtIdAnt"].")";
                    
                    if(!mysqli_query($c,$qry)){
                        // echo "<h1>Error</h1>";
                        header("location:".$ruta."pages/admin/hormigas-por-estado.php?newRelStateAnt=false"); // todo correcto return to ant
                    }
                    
                    mysqli_close($c);
                    // echo $txtName." <br>". $txtFamily ."<br> ".$txtSubfamily." <br>". $txtAlimentation."<br> ".$txtCare." <br>". $txtContent ."<br> ".$date." <br>". $imagen;
                    header("location:".$ruta."pages/admin/hormigas-por-estado.php?newRelStateAnt=true"); // todo correcto return to ant
                }
        }else{
            header("location: ".$ruta."pages/admin/hormigas-por-estado.php?err=2");
        }
    }else{
        header("location: ".$ruta."pages/admin/hormigas-por-estado.php?err=1");
    }

    

?>