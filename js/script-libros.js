(function(){
   	var url ='Herramientas/generarlibros.php';
    var link = 	document.getElementById('codigo_libro').value;
   		$.ajax({
		url:"https://www.googleapis.com/books/v1/volumes/"+link,
		dataType: "json",
		success: function(data){
			document.querySelector('#libro__portada').src=typeof data
				.volumeInfo.imageLinks
				.small!='undefined'?
				data.volumeInfo.imageLinks.small:
				'images/sin_portada.png';
			document.querySelector('#libro__titulo').innerHTML=typeof data
				.volumeInfo.title!='undefined'?
				data.volumeInfo.title:
				'Titulo desconocido';
			document.querySelector('#libro__autor').innerHTML=typeof data
				.volumeInfo.authors!='undefined'?
				data.volumeInfo.authors:
				'Sin datos del autor';
			document.querySelector('#libro__resumen').innerHTML=typeof data
				.volumeInfo.description!='undefined'?
				data.volumeInfo.description:'Sin resumen';
		},
		type: 'GET'
		});
    
   		$.ajax({
			url: 'Herramientas/generarlibrosGeneral.php',
			dataType: "json",
			success: function(datos){
				for (var i = datos.length - 1; i >= 0; i--) {
					var t = document.querySelector('#template_ultimos')
					var clone = document.importNode(t.content, true);
					clone.querySelector('.libro_enlace').href += datos[i].codigo;
					clone.querySelector('.libro_imagen').src = typeof datos[i]
						.portada!='undefined'?
						datos[i].portada:
						'images/sin_portada.png';
					clone.querySelector('#titulo_libro_ultimos').innerHTML = datos[i].titulo;
					clone.querySelector('#autor_libro_ultimos').innerHTML = datos[i].autor;
					document.querySelector('.ultimos').appendChild(clone);
				}
			},
			type:'GET'
		});
   	var dato = {
        "genero": url,
        "codigo": link
    };
   	$.ajax({
		url: 'Herramientas/librosofertados.php',
		data: 'codigo='+link,
		dataType: "json",
		success: function(datos){
			if ( typeof datos[0] != "undefined"){
				for (var i = datos.length - 1; i >= 0; i--) {			
					var t = document.querySelector('#template_librosofertados')
					var clone = document.importNode(t.content, true);
					if (datos[i].estado==1) {
						clone.querySelector('.estado').innerHTML = 'Se vende'
						clone.querySelector('.precio').innerHTML = '<b>Precio: $ </b>'+datos[i].precio;
						clone.querySelector('.listadeseos').innerHTML = ''
					}
					if (datos[i].estado==2) {
						clone.querySelector('.estado').innerHTML = 'Intercambio'
						clone.querySelector('.precio').innerHTML = ''
						clone.querySelector('.listadeseos').innerHTML ='<b>Lista de deseos: </b>'+datos[i].librosrequeridos;
					}
					if (datos[i].estado==3) {
						clone.querySelector('.estado').innerHTML = 'Se vende o intercambia'
						clone.querySelector('.precio').innerHTML = '<b>Precio: $ </b>'+datos[i].precio;
						clone.querySelector('.listadeseos').innerHTML = '<b>Lista de deseos: </b>'+datos[i].librosrequeridos;	
					}
						clone.querySelector('.usuariofertante').innerHTML = datos[i].nombre;
						clone.querySelector('.nombreoferente').value = datos[i].usuario;
						clone.querySelector('.foto_oferente').src = datos[i].foto;
						clone.querySelector('.estadolibro').innerHTML = datos[i].estadolibro;
						clone.querySelector('.imagenboton').id = datos[i].id
						document.querySelector('.ventana_oferta').appendChild(clone);
				}
			}else{
				var t = document.querySelector('#template_sindatos')
				var clone = document.importNode(t.content, true)
				document.querySelector('.ventana_oferta').appendChild(clone);
			}
		},
  		type:'GET'
	});
}());

$(".boton_cerrar").click(function () {	
	console.log('dentro del boton cerrar')
	$('.desplegable').hide('slow')
    $('.modal').add('.ventana_login').add('.ventana_oferta').addClass('invisible');
    document.getElementById('opinionlibro').value =''
    $('.mensaje_respuesta').val('') 
});

function mostrarModal(boton){
	if (document.getElementById('nomusuario')!='') {
		var desplegable = $(boton)
			.parents('.ofrecerlibros')
			.find('.desplegable')
		$('.desplegable').not(desplegable).hide('slow')
		desplegable.toggle('slow')
		$('.mensaje_respuesta').val('')
	}else{
		$('#sugerencia_registro').removeClass('invisible');
	}
}

function enviarmensaje(boton){
	var botonPadre = $(boton).parents('.ofrecerlibros')
    var mensaje = botonPadre.find('.mensaje_respuesta').val()
	if(!mensaje==''){
	    var emisor   = 	document.getElementById('nomusuario').value
	    var receptor = 	botonPadre.find('.nombreoferente').val()
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
	        },
	    });
	}
}

function mostrarModalA(tabla){
	if (document.getElementById('nomusuario').value!='') {
		var usuario = document.getElementById('nomusuario').value
		var codigo = 	document.getElementById('codigo_libro').value
		var mensaje = document.getElementById('opinionlibro').value
		if (mensaje==''&& tabla =='leidos') {
			return false
		}
		var url ='Herramientas/favoritos.php';
	    var datosmensaje = {
	    	'tabla': tabla,
	        'codigo': codigo,
	        'usuario': usuario,
	        'mensaje': mensaje
	    };
	    console.log(datosmensaje)
	    $.ajax({
	        type: "POST",
	        url: url,
	        data: datosmensaje, 
	        success: function(data){
	        	console.log(data)
	        	if (data=='leidos') {
	        		$('.modal').
	        			add('.ventana_login').
	        			add('.ventana_oferta').
	        			addClass('invisible')
	        			document.getElementById('opinionlibro').value =''
	        	}else{	
	        			$('#botonlistadeseos').
	        			add('.modal').
	        			removeClass('invisible');
	        	}
		    },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
     			alert(XMLHttpRequest);
     			console.log(XMLHttpRequest);
			},
	    });		
	}else{
		$('#sugerirlogin').add('.modal').removeClass('invisible');
	}
}

function mostrarModalB(){
	if (document.getElementById('nomusuario').value!='') {
		$('#botonopinionlibro').add('.modal').removeClass('invisible');
	}else{
		$('#sugerirlogin').add('.modal').removeClass('invisible');
	}
}

function mostrarModalC(){
	if (document.getElementById('nomusuario').value!='') {
		$('#botonrecomendar').add('.modal').removeClass('invisible');
	}else{
		$('#sugerirlogin').add('.modal').removeClass('invisible');
	}
}

function mostrarModaloferta(){
		$('#ventanofertas').add('.modal').removeClass('invisible');
}

$("#ingreso").click(function () {	
    $('.modal').add('#login').removeClass('invisible'); 
});

$(".boton_cerrar").click(function () {	
    $('.modal').add('.ventana_login').addClass('invisible'); 
});

$("#form_login").on('submit', function(evt){
    evt.preventDefault();
    var url ='Herramientas/login.php';
    var formulario = $(this).serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: formulario, 
        success: function(data){
            if(data=='si'){
                window.location ="Principal.php";
            }else{
                $('.mensaje_error').addClass('visible');
            }
        }
    });
})
