<?php

$ruta = "http://localhost/Parcial_3/Proyecto-final---DesWeb/";

/* Connect database */
function connectDB(){
	return mysqli_connect("localhost","root","","dbmexant");
}

/*setters*/
function set_header_title($title){
    echo "<h1 class =\"titlePage\"> Estamos en ".$title."</h1>";
}

/*general petition sql*/
function petitionSQL($qry){
    $c = connectDB();
    $rs = mysqli_query($c,$qry);
    return $rs;
}

/*getters*/
function get_user_rol($idUsuario){
    $con = connectDB();
    $rs = mysqli_query($con, "Select rol from users where id_user= ".$idUsuario);
    $datoUrs = mysqli_fetch_object($rs);
    return $datoUrs->rol;
}

function validForm_LogIn(){
    $res = true;
    if( document.getElementById('txtName').value == "" 	        ||
		document.getElementById('txtPassword').value ==  "" 
       ){
		$res = false;
	}

    return $res;
}

function validForm_SignUp(){
    $res = true;
    if( document.getElementById('txtName').value == "" 	        ||
		document.getElementById('txtPassword').value ==  "" 	||
		document.getElementById('txtRePassword').value == ""		||
		document.getElementById('txtEmail').value == ""	        ){
		$res = false;
	}else if(document.getElementById('txtPassword').value != document.getElementById('txtRePassword').value){
		$res = false;
	}

    return $res;
}

?>