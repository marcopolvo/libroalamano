(function(){
	var receptor = document.getElementById('usuario').value;
	var urlmensajes ='Herramientas/recibirmensaje.php';
	var datos = {
	    "receptor": receptor,
	};
	   	$.ajax({
		url: urlmensajes,
		data: datos,
		dataType: "json",
		success: function(data){
			if (typeof data[0] != "undefined") {
				for (var i = data.length - 1; i >= 0; i--) {
					var t = document.querySelector('#template_mensajes')
					var clone = document.importNode(t.content, true);
					clone.querySelector('.foto_oferente').src = data[i].foto
					clone.querySelector('.usuariomensaje').innerHTML = data[i].emisor
					clone.querySelector('.emailreceptor').value = data[i].email
					clone.querySelector('.hora').innerHTML = data[i].hora
					clone.querySelector('.fecha').innerHTML = data[i].fecha
					clone.querySelector('.mensaje_contenido').innerHTML = data[i].mensaje	
					clone.querySelector('.mensaje_botones').id = data[i].id
					document.querySelector('.mensajes_contenedor').appendChild(clone);
				}	
			}else{
				var t = document.querySelector('#sin_mensajes')
				var clone = document.importNode(t.content, true);
				clone.querySelector('.sin_mensajes_contenido').innerHTML = 'No hay mensajes';
				document.querySelector('.sin').appendChild(clone);
			}
		},
		type:'GET'
	});
}());	

function clickboton(boton){
	var desplegable = $(boton)
				.parents('.ofrecerlibros')
				.find('.desplegable')
	$('.desplegable').not(desplegable).hide('slow')
	desplegable.toggle('slow')
	$('.mensaje_respuesta').val('')
}

function enviarmensaje(boton){
	var botonPadre = $(boton).parents('.ofrecerlibros')
    var mensaje = botonPadre.find('.mensaje_respuesta').val()
	if(!mensaje==''){
	    var emisor   = 	document.getElementById('usuario').value
	    var receptor = 	botonPadre.find('.emailreceptor').val()
	    var url ='Herramientas/enviarmensajes.php';
	    var datosmensaje = {
	        "emisor": emisor,
	        "receptor": receptor,
	        "mensaje": mensaje
	    };
	    $.ajax({
	        type: "POST",
	        url: url,
	        data: datosmensaje, 
	        success: function(data){
	            botonPadre.find('.desplegable').toggle('slow');
	            $('.mensaje_respuesta').val('')
	        }
	    });
	}
}

function borrarMensaje(boton){
	var confirmar = confirm('confirma que deseas borrar el mensaje')
	if (confirmar) {
		$.ajax({
			type: "POST",
			url:'Herramientas/borrarmensaje.php',
			data: {
				"idmensaje": $(boton).parent().attr('id'),
				"estado":'borrado'
			},
			success: function(datos){
				console.log(datos)
				location.reload() 
			}
		});
	}else{
		console.log('mensaje negado')
	}
}

function reportarMensaje(){
	var confirmar = confirm('Reportar un mensaje es una opción seria\n¿Estás seguro que desear reportar este mensaje?')
}	
