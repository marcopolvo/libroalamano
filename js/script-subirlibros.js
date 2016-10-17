console.log('dentro del script');
/*$("a[id=boton_del_cambio]").click(function(){
$(".templete").on('click','a',function(){
	console.log('dentro del el boton 1')
});
 	console.log('dentro del el boton 2')
 });
$("#boton_del_cambio").click(function(event) {
  console.log('dentro del el boton 1')
});*/ 
$('#buscar').keypress(function(e){   
    if(e.which == 13){      
        buscarlibro();      
    }   
});

function buscarlibro(){
	var buscar = document.getElementById('buscar').value;
	console.log('dentro de la funcion');
	
   	$.ajax({
		url:"https://www.googleapis.com/books/v1/volumes?q="+buscar,
		dataType: "json",
		success: function(data){
			console.log('dentro del for');
			for (var i = 0; i<10; i++) {
				var t = document.querySelector('#template_resultado')
				var clone = document.importNode(t.content, true);
				clone.querySelector('.resultado_enlace').id = data.items[i].id
				clone.querySelector('.resultado_imagen').src = data.items[i].volumeInfo.imageLinks.thumbnail;
				clone.querySelector('.resultado_titulo').innerHTML = data.items[i].volumeInfo.title;
				clone.querySelector('.resultado_autor').innerHTML = data.items[i].volumeInfo.authors;
				document.querySelector('.resultados').appendChild(clone);
			}
		},
		type:'GET'
	});
}
function ingresarformulario(aboton){

	$('.buscador_small').addClass('invisible');
	$('.subir').removeClass('invisible');
	   	
	   	$.ajax({
		url:"https://www.googleapis.com/books/v1/volumes/"+aboton,
		dataType: "json",
		success: function(data){
			console.log(data)
			document.querySelector('#subir').action+=data.volumeInfo.imageLinks.thumbnail
			document.querySelector('#subir_titulo').value=data.volumeInfo.title
			document.querySelector('#subir_autor').value=data.volumeInfo.authors
			document.querySelector('#subir_codigo').value=data.id
			document.querySelector('#subir_resumen').value=data.volumeInfo.description

			document.querySelector('#subir_portadaB').src=data.volumeInfo.imageLinks.thumbnail
			document.querySelector('#subir_tituloB').value=data.volumeInfo.title
			document.querySelector('#subir_autorB').value=data.volumeInfo.authors
			document.querySelector('#subir_codigoB').value=data.id
			document.querySelector('#subir_resumenB').value=data.volumeInfo.description
		},
		type: 'GET'
	});
}
/*
$("#subir").on('submit', function(evt){
        evt.preventDefault();
        var url ='Herramientas/subirdatos.php';
        var formulario = $(this).serialize();
        console.log(formulario);
        $.ajax({
           type: "POST",
           url: url,
           data: formulario, 
           success: function(data){
                console.log(data);
            }
        });
    })
*/

document.getElementById('boton_buscar').addEventListener('click', buscarlibro, false)
