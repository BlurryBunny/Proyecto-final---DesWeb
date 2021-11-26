const validaFRM = ()=>{

    let res =false;
    if( document.getElementById('txtUsuario').value == "" 	||
        document.getElementById('txtPwd').value == "" 		||
        document.getElementById('txtRePwd').value == ""		||
        document.getElementById('txtEmail').value == ""	){


    } else if(document.getElementById('txtPwd').value != document.getElementById('txtRePwd').value){
        document.getElementById("txtMsg").innerHTML = "Las contraseñas deben de ser iguales";
        document.getElementById('txtPwd').value = "";
        document.getElementById('txtRePwd').value = "";

    }else{
        res = true;
    }

    return res;
}