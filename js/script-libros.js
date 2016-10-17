(function(){
   	var url ='Herramientas/generarlibros.php';
    var link = 	document.getElementById('codigo_libro').value;

   		$.ajax({
		url:"https://www.googleapis.com/books/v1/volumes/"+link,
		dataType: "json",
		success: function(data){
			document.querySelector('#libro__portada').src=data.volumeInfo.imageLinks.small
			document.querySelector('#libro__titulo').innerHTML=data.volumeInfo.title
			document.querySelector('#libro__autor').innerHTML=data.volumeInfo.authors
			document.querySelector('#libro__resumen').innerHTML=data.volumeInfo.description
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
				if (true) {}
				clone.querySelector('.libro_imagen').src = datos[i].portada;
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
    			console.log('definido')
				console.log(isEmptyJSON(dato))
				var t = document.querySelector('#template_librosofertados')
				var clone = document.importNode(t.content, true);
				//clone.querySelector('.libro_enlace').href += datos[i].codigo;
				if (datos[0].estado==1) {
					clone.querySelector('#estado').innerHTML = 'Se vende'
					clone.querySelector('#precio').innerHTML = datos[0].precio;
					clone.querySelector('#listadeseos').innerHTML = ''
				}
				if (datos[0].estado==2) {
					clone.querySelector('#estado').innerHTML = 'Intercambio'
					clone.querySelector('#precio').innerHTML = ''
					clone.querySelector('#listadeseos').innerHTML = datos[0].librosrequerestadoos;
				}
				if (datos[0].estado==3) {
					clone.querySelector('#estado').innerHTML = 'Se vende o intercambia'
					clone.querySelector('#precio').innerHTML = datos[0].precio;
					clone.querySelector('#listadeseos').innerHTML = datos[0].librosrequeridos;	
				}
					clone.querySelector('#usuariofertante').innerHTML = datos[0].usuario;
					clone.querySelector('#estadolibro').innerHTML = datos[0].estadolibro;
					document.querySelector('.ventana_oferta').appendChild(clone);
				}else{
					var t = document.querySelector('#template_sindatos')
					var clone = document.importNode(t.content, true)
					//clone.querySelector('#estadolibro').innerHTML += '.';
					document.querySelector('.ventana_oferta').appendChild(clone);
				}
			},
  			error: function(XMLHttpRequest, textStatus, errorThrown) {
     			alert(XMLHttpRequest);
     			console.log(XMLHttpRequest);
			},
		type:'GET'
	});
}());

function isEmptyJSON(obj) {
  for(var i in obj) { return false; }
  return true;
}

$("#botonenviarmensaje").click(function(){
        var emisor = 	document.getElementById('nomusuario').value;
        var receptor = 	document.getElementById('usuariofertante').innerHTML;
        var mensaje = document.getElementById('mensajelibro').value;
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
                $('.modal').add('.ventana_login').addClass('invisible'); 
           	}
        });
    })

$(".boton_cerrar").click(function () {	
    $('.modal').add('.ventana_login').addClass('invisible'); 
});

function dejarver(){
	if (document.getElementById('nomusuario')!='') {
		$('#ofertaslibros').removeClass('invisible');
	}else{
		$('#sugerencia_registro').removeClass('invisible');
	}
	
}
function mostrarModal(idboton){
	$('#mensajeintercambio').add('.modal').removeClass('invisible');
}

function mostrarModalA(){
	if (document.getElementById('nomusuario').value!='') {
		$('#botonlistadeseos').add('.modal').removeClass('invisible');
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
	console.log('se hizo click1'); 
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