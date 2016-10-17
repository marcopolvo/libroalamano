var validador ;
function validar(){
	var estado = true;
	estado = estado && validarnombre()
	//estado = estado && validarapellido()
	estado = estado && validaremail()
	estado = estado && validarclave()
	estado = estado && validargenero()

	return estado;
	
}

function validarnombre(){
	var mensaje = document.getElementById('mensajerror_nombre')
	valor = document.getElementById("nombre").value;
	var espaciosRegex = /[a-z]/i;
	if( valor == null || valor.length < 4|| !espaciosRegex.test(valor) ) {
		mensaje.innerHTML ='Mínimo 4 caracteres.';
		mensaje.addclass('borde_error')
  		return false;
	}else{
	   	$.ajax({
			url:"Herramientas/disponibilidad.php",
			data: {'nombre': valor},
			type:'POST',
			success: function(data){
				if (data=='si') {
					mensaje.innerHTML ='El nombre ya ha sido registrado';
				}else
					mensaje.innerHTML ='';
			}	
		});

		if (mensaje.innerHTML === 'El nombre ya ha sido registrado') {
			return false;
		}else{
			return true;
		}
	}
}

function validarapellido(){

}

function validaremail(){
	var mensaje = document.getElementById('mensajerror_email')
	var valor = document.getElementById("email").value;
	var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	if( !emailRegex.test(valor)) {
  		document.getElementById('mensajerror_email').innerHTML='Debe tener el formato ejemplo@correo.com.';
  		return false;
	}else{
	   	$.ajax({
			url:"Herramientas/disponibilidad2.php",
			data: {'nombre': valor},
			type:'POST',
			success: function(data){
				if (data=='si') {
					mensaje.innerHTML ='El correo ya ha sido registrado';	
				}else
					mensaje.innerHTML ='';	
			}
		});

		if (mensaje.innerHTML === 'El correo ya ha sido registrado') {
			return false;
		}else{
			return true;
		}
	}
}

function validarclave(){
	mensaje = document.getElementById('mensajerror_clave')
	valor = document.getElementById("clave").value;
	var espaciosRegex = /[a-z]/i;
	if( valor == null || valor.length < 8 || espaciosRegex.test(valor) ) {
		mensaje.innerHTML='Debe tener mínimo 8 caracteres, sin espacios';
  		return false;
	}else{
		mensaje.innerHTML = '';
		return true;
	}
}

function validargenero(){
	mensaje = document.getElementById('mensajerror_genero')
	indice = document.getElementById("generop").selectedIndex;
	if( indice == null || indice == 0 ){ 
		document.getElementById('mensajerror_genero').innerHTML='Selecciona al menos una categoría.';
		return false;
	}else{
		mensaje.innerHTML = '';
		return true;
	}
}
/*
*/