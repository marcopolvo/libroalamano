console.log('dentro del script reportes')
document.getElementById('botonreporte').addEventListener('click', mostrar, false)

function mostrar(){
	console.log('dentro de la funcion mostrar')
	if (document.getElementById('textoreporte').value!='') {
		enviareportes()
	}else{
		console.log('no hay texto que enviar')
	}
}
function enviareportes(){
	var usuario = document.getElementById('usuario').value;
	var mensaje = document.getElementById('textoreporte').value;
	var lugar = document.getElementById('page_principal').id;
	var datos={
		'usuario': usuario,
		'mensaje': mensaje,
		'lugar': lugar
	}
   	$.ajax({
		url:"Herramientas/enviareportes.php",
		type: 'POST',
		data: datos,
		success: function(data){
			console.log(data);
			agradecimiento();
			
		}
	});
}

function agradecimiento(){
	document.getElementById('textoreporte').value='';
	document.getElementById('check').checked= false;
	$('.modal').add('.ventana_login').removeClass('invisible');
}