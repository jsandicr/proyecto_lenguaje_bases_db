function ordernar(option){
    window.location.href = "./ordenar.php"
}

function preguntarSiNo(){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro de cliente?', function(){ alertify.error('Se cancelo')});
}

$(document).ready(function() {
    $('#tabla').load('../componentes/tablaUsuarios.php');
    $('#buscador').load('../componentes/buscadorUsuarios.php');
    $('#actualizadatos').click(function() {
        actualizaDatos();
    });
});