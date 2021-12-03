

//show an alert to user
const my_alert = (my_msg) =>{
    alert(my_msg);
}


const valida_Post_admin = () =>{
    return true;
}

const valida_Nueva_Hormiga = () =>{
    if( document.getElementById('txtName').value == "" 	        ||
		document.getElementById('txtFamily').value == "" 		||
		document.getElementById('txtSubfamily').value == ""		||
		document.getElementById('txtAlimentation').value == ""	||
        document.getElementById('txtCare').value == ""		    ||
        document.getElementById('txtContent').value == ""		){

		alert('Todos los datos del formulario son requeridos');
		return false;
	}

    return true;
}
