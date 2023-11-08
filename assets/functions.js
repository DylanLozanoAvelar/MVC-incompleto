function objectAjax(){
	var xmlhttp = false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");			
		} catch (E){
			xmlhttp = false;	
		}		
	}
	if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
//Inicializo automaticamente la funcion read al entrar a la pagina o recargar la pagina;
addEventListener('load', read, false);

function read(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=administrator&m=tbl_bomba',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

function register(){
	tipoBomba 		= document.formUser.tipoBomba.value;
	tipoCombustible 	= document.formUser.tipoCombustible.value;
	estado 		= document.formUser.estado.value;
	capacidad	= document.formUser.capacidad.value;
	ubicacion 		= document.formUser.ubicacion.value;
	numEmpleados 	= document.formUser.numEmpleados.value;
	fechaRegistro 		= document.formUser.fechaRegistro.value;

	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registeruser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==8){			
			read();			
			alert('Los datos guardaron correctamente.');			
			$('#addUser').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("tipoBomba="+tipoBomba+"&tipoCombustible="+tipoCombustible+"&estado="+estado+"&capacidad="+capacidad+"&ubicacion="+ubicacion+"&numEmpleados="+numEmpleados+"&fechaRegistro="+fechaRegistro);
}	

function update(){
	idBomba 			= document.formUserUpdate.idBomba.value;
	tipoBomba 		= document.formUserUpdate.tipoBomba.value;
	tipoCombustible 	= document.formUserUpdate.tipoCombustible.value;
	estado 		= document.formUserUpdate.estado.value;
	capacidad 			= document.formUserUpdate.capacidad.value;
	ubicacion 		= document.formUserUpdate.ubicacion.value;
	numEmpleados 	= document.formUserUpdate.numEmpleados.value;
	fechaRegistro 		= document.formUserUpdate.fechaRegistro.value;

	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updateuser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==8){
			read();
			$('#updateUser').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("tipoBomba="+tipoBomba+"&tipoCombustible="+tipoCombustible+"&estado="+estado+"&capacidad="+capacidad+"&ubicacion="+ubicacion+"&numEmpleados="+numEmpleados+"&fechaRegistro="+fechaRegistro+"&idBomba="+idBomba);

}

function deleteUser(idBomba){	
	if(confirm('¿Esta seguro de eliminar este registro?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=deleteuser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==8){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("idBomba="+idBomba);
	}
}

function ModalRegister(){
	$('#addUser').modal('show');
}

function ModalUpdate(idBomba,tipoBomba,tipoCombustible,estado,capacidad,ubicacion,numEmpleados,fechaRegistro){			
	document.formUserUpdate.idBomba.value 			= idBomba;
	document.formUserUpdate.tipoBomba.value 			= tipoBomba;
	document.formUserUpdate.tipoCombustible.value 	= tipoCombustible;
	document.formUserUpdate.estado.value 		= estado;
	document.formUserUpdate.capacidad.value 	= capacidad;
	document.formUserUpdate.ubicacion.value 		= ubicacion;
	document.formUserUpdate.numEmpleados.value 	= numEmpleados;
	document.formUserUpdate.fechaRegistro.value 		= fechaRegistro;
	$('#updateUser').modal('show');
}

/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/