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