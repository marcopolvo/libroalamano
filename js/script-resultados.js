(function(){
	var buscar = document.getElementById('buscar').value
	console.log(buscar)
   	$.ajax({
		url:"https://www.googleapis.com/books/v1/volumes?q="+buscar,
		//data: datosGenerales,
		dataType: "json",
		success: function(data){
			console.log('dentro del for');
			for (var i = 0; i<10; i++) {
				var t = document.querySelector('#template_resultado')
				var clone = document.importNode(t.content, true);
				clone.querySelector('.resultado_enlace').href += data.items[i].id
				//clone.querySelector('.resultado_enlace').href += data.items[i].id
				clone.querySelector('.resultado_imagen').src = data.items[i].volumeInfo.imageLinks.thumbnail;
				clone.querySelector('.resultado_titulo').innerHTML = data.items[i].volumeInfo.title;
				clone.querySelector('.resultado_autor').innerHTML = data.items[i].volumeInfo.authors;
				document.querySelector('.resultados').appendChild(clone);
			}
		},
		type:'GET'
	});
}());

function buscarlibro(){
    var busqueda = document.getElementById('buscar').value;
    if (busqueda!='') {
        window.location ="resultados.php?search="+busqueda;
    } 
}
document.getElementById('boton_buscar').addEventListener('click', buscarlibro, false);

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