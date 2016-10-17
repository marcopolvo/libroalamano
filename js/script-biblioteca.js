
(function(){
	var genero = document.getElementById('namegenero').value; 
    var cantidad = document.getElementById('cantidad').value; 
	console.log(genero)
	var url ='Herramientas/generarlibrosGeneral.php';
    var datos = {
        "genero": genero,
        "cantidad": cantidad
    }
       
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
}());

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