<?php
    if(isset($_GET["idPhoto"])){
        if($_GET["idPhoto"]!=""){
            $c = connectDB();
            $qry = "Select type,name,content from profile_photos where id_photo = ".$_GET["idPhoto"]." and id_user = ".$_SESSION["idU"];
            $rs = mysqli_query($c,$qry);
            $imagen = mysqli_fetch_array($rs);
            header("Content-type:".$imagen["type"]);

            if($imagen["content"]){
                echo $imagen["content"];
            }else{
                echo "<i class='bx bx-user' id='profile_photo'></i>"
            }
        }
    }
?>