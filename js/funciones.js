function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos de usuario', '¿Esta seguro de eliminar este  usuario?', 
                function(){ eliminarDatos(id) },	
                function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('../componentes/TablaUsuarios.php');
					alertify.success("Usuario eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function agregaform(datos){

	d=datos.split('||');

	$('#id').val(d[0]);
	$('#nomb').val(d[1]);
	$('#ape1').val(d[2]);
	$('#ape2').val(d[3]);
	$('#dire').val(d[4]);
    $('#tel').val(d[5]);
	
}


function actualizaDatos(){


	id=$('#id').val();
	nombre=$('#nomb').val();
	apellido1=$('#ape1').val();
	apellido2=$('#ape2').val();
	direccion=$('#dire').val();
    telefono=$('#tel').val();

	cadena= "id=" + id +
			"&nomb=" + nombre + 
			"&ape1=" + apellido1 +
			"&ape2=" + apellido2 +
			"&dire=" + direccion +
            "&tel=" + telefono;

	$.ajax({
		type:"POST",
		url:"../php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				
				$('#tabla').load('../componentes/tablaUsuarios.php');
				alertify.success("Usuario actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}
function agregardatos(cedula,nombre,apellido1,apellido2,direccion,telefono,contra,rol){

	cadena="cedula=" + cedula + 
		"&nombre=" + nombre +
		"&apellido1=" + apellido1 + 
		"&apellido2=" + apellido2 +
		"&telefono=" + telefono +
		"&direccion=" + direccion + 
		"&contra=" + contra +
		"&rol=" + rol;
	
	$.ajax({
	  type:"POST",
	  url:"../php/agregarDatos.php",
	  data:cadena,
	  success:function(r){
		if(r==1){
		  $('#tabla').load('../componentes/tablaUsuarios.php');
		  $('#buscador').load('../componentes/buscadorUsuarios.php');
		  alertify.success("agregado con exito :)");
		}else{
		  alertify.error("Fallo el servidor :(");
		}
	  }
	});
	function cerrarSesion(){
		window.location.href = "salir.php";
	  
	  }

	}
	function preguntarSiNoCerrarSesion(){
		alertify.confirm('Cerrar Sesión', '¿Esta seguro de cerrar la sesión?', 
			  function(){ cerrarSesion() }
					, function(){ alertify.error('Se cancelo')});
	}
	