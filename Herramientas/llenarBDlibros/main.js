function buscarlibro(){
	var buscar = document.getElementById('buscar').value
	var titulo = document.getElementById('titulo').value
	var codigo = document.getElementById('codigo').value
	//var genero = document.getElementById('genero').value
	console.log('dentro de el script')

	$.ajax({
		url:"https://www.googleapis.com/books/v1/volumes?q="+buscar,
		dataType: "json",
		success: function(data){
			console.log(data)
				document.getElementById('codigo').value = data.items[0].id
				document.getElementById('titulo').value= data.items[0].volumeInfo.title
				document.getElementById('autor').value = data.items[0].volumeInfo.authors
				document.getElementById('portada').value = data.items[0].volumeInfo.imageLinks.thumbnail
				resultados.innerHTML +="<img src="+data.items[0].volumeInfo.imageLinks.thumbnail+">";
				//genero = data.items[i].volumeInfo.imageLinks.thumbnail+">"
				//+"</p>"+"<p><b>Resumen</b>"+data.items[i].volumeInfo.description+"</p>"
		},
		type: 'GET'
	});
}
document.getElementById('boton').addEventListener('click', buscarlibro, false)