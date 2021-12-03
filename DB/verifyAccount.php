<?php
session_start();
include("connectDB.php");
    $res = 5;
    //verificar que txt usuario y txt pwd esten en el formulario
    if(isset($_POST['txtName']) && isset($_POST['txtPassword'])){
        //Verificar que no sean cadenas vacias
        if($_POST['txtName']!= "" && $_POST['txtPassword']!=""){
            //conectar a la BD para verificar User y Psw son correctos
            $c = connectDB();
            //consulta de user y pass
            $qry = "select * from users where name='" . $_POST['txtName'] . "' and password = '" . $_POST['txtPassword']. "'";
            $rs = mysqli_query($c,$qry);
            
            //verificar si existe un dato
            if(mysqli_num_rows($rs)>0){
                $datosUsuario = mysqli_fetch_array($rs);
                $_SESSION['idU'] = $datosUsuario["id_user"];
                $_SESSION['nombre'] = $datosUsuario["name"];

                echo "<h1>Que onda</h1>";
                if(get_user_rol($_SESSION["idU"]) == "Administrador"){
                    echo "<h1>Hola<h1>";
                    $res = 1; // administrador go to dashboard
                }else{
                    $res =2; // general go to map
                }
            }else{
                $res =3; //no data in the row
            }

            mysqli_close($c);
        }else{
            $res=4; //no hay datos en formulario
        }
    }

    if($res == 1){
        header("location:".$ruta."pages/admin/dashboard.php?logIn=true"); 
    }else if($res == 2){
        header("location:".$ruta."pages/web/mapa.php?logIn=true"); 
    }else if($res == 3){
        header("location:".$ruta."pages/general/logIn.php?err=1"); // no data in the row
    }else if($res == 4){
        header("location:".$ruta."pages/general/LogIn.php?err=2");  // no hay datos en el formulario
    }else{
        header("location:".$ruta."pages/general/LogIn.php?err=3");  // no existen elementos
    }

?>

<!-- 
    res
    0 : no hay error, se ingreso todo correctamente
    1: contraseña o usuario no valido
    2: no hay datos en el formulario
-->
