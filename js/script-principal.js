console.log('dentro de script-principal');

function buscarlibro(){
	var busqueda = document.getElementById('buscar').value;
	if (busqueda!='') {
		window.location ="resultados.php?search="+busqueda;
	} 
}

$('#buscar').keypress(function(e){   
    if(e.which == 13){      
        buscarlibro();      
    }   
});

document.getElementById('boton_buscar').addEventListener('click', buscarlibro, false);

(function(genero,cantidad){
   	var url ='Herramientas/generarlibros.php';
    var datos = {
        "genero": genero,
        "cantidad": cantidad
    };
   		$.ajax({
		url: url,
		data: datos,
		dataType: "json",
		success: function(data){
			for (var i = data.length - 1; i >= 0; i--) {
				
				console.log(data[i].autor)
				var t = document.querySelector('#template')
				var clone = document.importNode(t.content, true);
				clone.querySelector('.libro_enlace').href += data[i].codigo;
				clone.querySelector('img').src = data[i].portada;
				clone.querySelector('#titulo_libro').innerHTML = data[i].titulo;
				clone.querySelector('#autor_libro').innerHTML = data[i].autor;
				document.querySelector('.recomendados').appendChild(clone);
			}
		},

  		error: function(XMLHttpRequest, textStatus, errorThrown) {
     		alert(XMLHttpRequest);
     	//Se puede obtener informacion útil inspecionando el Objeto XMLHttpRequest
     		console.log(XMLHttpRequest);
	},
		type:'GET'
	});
    	
   		$.ajax({
		url: 'Herramientas/generarlibrosUltimos.php',
		//data: datosGenerales,
		dataType: "json",
		success: function(datos){
			for (var i = datos.length - 1; i >= 0; i--) {
				var t = document.querySelector('#template_ultimos')
				var clone = document.importNode(t.content, true);
				clone.querySelector('.libro_enlace').href += datos[i].codigo;
				clone.querySelector('.libro_imagen').src = datos[i].portada;
				clone.querySelector('#titulo_libro_ultimos').innerHTML = datos[i].titulo;
				clone.querySelector('#autor_libro_ultimos').innerHTML = datos[i].autor;
				document.querySelector('.ultimos').appendChild(clone);
			}
		},
		type:'GET'
	});
   	$.ajax({
		url: 'Herramientas/generarlibrosGeneral.php',
		//data: datosGenerales,
		dataType: "json",
		success: function(datosB){
			for (var i = datosB.length - 1; i >= 0; i--) {	
				var t = document.querySelector('#template_valorados')
				var clone = document.importNode(t.content, true);
				clone.querySelector('.libro_enlace').href += datosB[i].codigo;
				clone.querySelector('.libro_imagen').src = datosB[i].portada;
				clone.querySelector('#titulo_libro_valorados').innerHTML = datosB[i].titulo;
				clone.querySelector('#autor_libro_valorados').innerHTML = datosB[i].autor;
				document.querySelector('.Valorados').appendChild(clone);
			}
		},
		type:'GET'
	});
   		
}( 
	document.getElementById('genero').value,
	document.getElementById('cantidad').value
	));

$(".boton_cerrar").click(function () {	
    $('.modal').add('.ventana_login').addClass('invisible'); 
});
/*
for (var i = 10 - 1; i >= 0; i--) {
var t = document.querySelector('#template');
var clone = document.importNode(t.content, true);
clone.querySelector('h1').innerHTML = 'Eureka';
clone.querySelector('h3').innerHTML = 'estoy trabajando con un t';
document.body.appendChild(clone);	
}
	
	 $.ajax({
        url: url,
        data: datosB, 
        dataType: "json",
        success: function(dato){
            console.log(dato.autor)
        },
        type: "GET"
    });
*/
