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

$("#ingreso").click(function () {	
	console.log('se hizo click1'); 
    $('.modal').add('#login').removeClass('invisible'); 
});

$(".boton_cerrar").click(function () {	
	console.log('se hizo click2'); 
    $('.modal').add('.ventana_login').addClass('invisible'); 
});

$("#form").on('submit', function(evt){
        evt.preventDefault();
        var url ='Herramientas/datos.php';
        var formulario = $(this).serialize();
        console.log('dendro de ajax');
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

$("#form_login").on('submit', function(evt){
        evt.preventDefault();
        var url ='Herramientas/login.php';
        var formulario = $(this).serialize();
        $.ajax({
           type: "POST",
           url: url,
           data: formulario, 
           success: function(data){
            console.log(data)
                if(data=='si'){
                	window.location ="Principal.php";
                }else{
                	$('.mensaje_error').addClass('visible');
                }
            }
        });
    });
(function(){
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
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest);
            //Se puede obtener informacion útil inspecionando el Objeto XMLHttpRequest
            console.log(XMLHttpRequest);
        },
        type:'GET'
    });
}());

$(window).load(function(){
    $(".precargar").fadeOut('slow');
});
    