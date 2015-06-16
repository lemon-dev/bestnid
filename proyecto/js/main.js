$(".text-hint").hide();

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Por favor rellene este campo");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});


$(document).ready(function() {
    
	// Side-nav initialize
	$(".button-collapse").sideNav();  
	$('.collapsible').collapsible();
	
	// Select initialize
	$('select').material_select();

	// Form validation

	// Loguearse
	// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    	

    	//inicializacion del date picker


     $('.datepicker').pickadate({
    		selectMonths: true, // Creates a dropdown to control month
    		selectYears:15 // Creates a dropdown of 15 years to control year
  		});
	
	// Form submission

	// Verifico el nombre de usuario
	$("#login-form").submit(function (event) {
		// Si esta vacio
		event.preventDefault();

		var nombre_usuario = $('#usuario').val();
		var password = $('#password').val();

		if(nombre_usuario == "" || password == "") {

			if(nombre_usuario == ""){
				$("#log-name-hint").show();
			} else {
				$("#log-name-hint").hide();
			}
			

			if(password == ""){
				$("#log-pass-hint").show();
			} else {
				$("#log-pass-hint").hide();
			}
		
		} else {

			$(".text-hint").hide();

			// Debugging
			// console.log(nombre_usuario);

			$.ajax({
				method: "POST",
				url: "db/ajax_user_validate.php",
				dataType: 'json',
				data: {	action: 	"user_validate",
						nombre: 	nombre_usuario,
						pass: 	 	password
				},
				cache: false,
				encode: true,
				success: function(data) {
					console.log(data);

					if(data.status == 'fail'){

						// Toast - Cambiar
						Materialize.toast('Usuario o contraseña incorrecto', 5000);
						$("#password").val('');

					} else {

						$.ajax({
							method: 	"POST",
							url: 		"/function/login-process.php",
							data: {	action: 	"user_validate",
									nombre: 	nombre_usuario,
									pass: 	 	password
							},
							cache: false,
							encode: true,
							success: function(data) {
								if(data.status = 'success'){
									window.location.href = '/index.php';
								} else {
									Materialize.toast(data.message, 5000);
								}
							},
							error: function(xhr, ajaxOptions, thrownError) {
					       		console.log(xhr.status);
					        	console.log(thrownError);
			       	 		}
						})

					}

				},
				error: function(xhr, ajaxOptions, thrownError) {
		       		console.log(xhr.status);
		        	console.log(thrownError);
		        }
			});
		}
	});
	
	//validacion campos del register
	
	$("#nombre").blur(function(e) {
	    var val = $(this).val();
	   	if (val.match(/[^a-zA-Z]/g)) {
	       $(this).val(val.replace(/[^a-zA-Z]/g, ''));
	       $("#name-hint").show();
	   	} else {
	   		$("#name-hint").hide();
	   	}
	});

	$("#apellido").blur(function(e) {
	    var val = $(this).val();
	   	if (val.match(/[^a-zA-Z]/g)) {
	      	$(this).val(val.replace(/[^a-zA-Z]/g, ''));
	      	$("#lastname-hint").show();
	   	} else {
	   		$("#lastname-hint").hide();
	   	}
	});

	$("#usuario").blur(function () {
		if($(this).val() == '') {
			$('#name-hint').html('Ingrese su nombre de usuario');
			$('#name-hint').show();
		} else {
			$('#name-hint').hide();
		}
	});
		
	$("#dni").blur(function(e) {
	    var val = $(this).val();
	   	if (val.match(/[^0-9]/g)) {

	      	$(this).val(val.replace(/[^0-9]/g, ''));
	      	$('#dni-hint').className = "text-hint warning";
	      	$('#dni-hint').html("* El DNI solo puede contener numeros,caracteres invalidos han sido omitidos")
	      	$("#dni-hint").show();
	   	} else {
	   		
	   		$("#dni-hint").hide();
	   	}
	   	if (val < 10000000){
	   		$('#dni-hint').className = "text-hint error";
	   		$("#dni-hint").html("* Por favor ingrese un DNI valido");
	   		$("#dni-hint").show();
	   	}
	});
	
	$("#tarjeta").blur(function(e) {
	    var val = $(this).val();
	   	if (val.match(/[^0-9]/g)) {

	      	$(this).val(val.replace(/[^0-9]/g, ''));
	      	$('#dni-hint').className = "text-hint warning";
	      	
	      	$("#tarjeta-hint").show();
	   	} else {
	   		
	   		$("#dni-hint").hide();
	   	}
	});
	
	// Registrar
	// Event handlers para el formulario de registro

	$('#nombre_usuario').blur(function () {

		nombre_usuario = $('#nombre_usuario').val();

		$.ajax({
			method: "POST",
			url: "db/ajax_user_exists.php",
			dataType: 'json',
			data: {	action: "user_exists",
					nombre_usuario: nombre_usuario},
			cache: false,
			encode: true,
			success: function(error) {
				if(error.status == "fail") {
					// El nombre de usuario ya existe
					$("#register-form #user-hint").show();
				} else {
					// El nombre no existe
					$("#register-form #user-hint").hide();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        alert(xhr.status);
		        alert(thrownError);
		    }
		});
	});

	// Validación del formulario luego del submit

	$("#register-form").submit(function (event) {
		event.preventDefault();

		var nombre = $.trim($('#nombre').val());
		var apellido = $.trim($('#apellido').val());
		var dni = $.trim($('#dni').val());
		var email = $.trim($('#email').val());
		var nombre_usuario = $.trim($('#nombre_usuario').val());
		var password = $.trim($('#password').val());
		var val_password = $.trim($('#val_password').val());
		var tarjeta = $.trim($('#tarjeta').val());

		if(nombre == '' || apellido == '' || dni == '' ||
			email == '' || nombre_usuario == '' || 
			password == '' || tarjeta == '') {
			
			window.alert("Por favor llene todos los campos.");
		
		} else {

			if(password != val_password){
				
				//$("#register-form #pass-hint").html('Las contraseñas no coinciden, vuelva  intentarlo');
				$("#register-form #pass-hint").show();
				$("#password").val('');
				$("#val_password").val('');
			
			} else {

				$("#register-form #pass-hint").hide();
				formData = $(this).serialize();	
		
				$.ajax({
					method: "POST",
					url: "function/form_process.php",
					dataType: 'json',
					data: formData,
					cache: false,
					encode: true,
					success: function(data){
						
						if(data.success == true){
							window.location.href = 'register.php?status=success';
						} else {
							window.location.href = 'register.php?status=fail';
						}
					}
				});
			}
		}
	});

//validacion campos  de formulario para crear subasta

function ValidURL(str) {
	 var pattern = /^(http|https|ftp)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi;
	  if(str.match(pattern))
        return true;
    else
        return false;

}
function checkImgURL(url) {
    return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
}
	/*$("#tarjeta").blur(function(e) {
	    var val = $(this).val();
	   	if (val.match(/[^0-9]/g)) {

	      	$(this).val(val.replace(/[^0-9]/g, ''));
	      	$('#dni-hint').className = "text-hint warning";
	      	
	      	$("#tarjeta-hint").show();
	   	} else {
	   		
	   		$("#dni-hint").hide();
	   	}
	});*/
$('#subastaImagenUrl').blur(function(){
	var val = $(this).val();
	if (ValidURL(val) && checkImgURL(val)){
		$('#subastaImagenUrl-hint').hide();
	}else{
		$('#subastaImagenUrl-hint').show();
	}
});


//validacion de formulario de  crear subasta luego del submit
	$("#subasta-form").submit(function (event) {
		console.log("Hello");
		event.preventDefault();

		var subastaTitulo = $.trim($('#subastaTitulo').val());
		var subastaImagenUrl = $.trim($('#subastaImagenUrl').val());
		var subastaDesc = $.trim($('#subastaDesc').val());
		var subastaFechaFin = $('#subastaFechaFin').val();
		var subastaCategorias = $('#subastaCategorias').val();
		

		if(subastaTitulo == '' || subastaImagenUrl == '' || subastaDesc == '' ||
			subastaFechaFin =='') {
			
			window.alert("Por favor llene todos los campos.");
		
		} else {



				
				formData = $(this).serialize();	
		
				$.ajax({
					method: "POST",
					url: "function/crearSubasta_process.php",
					dataType: 'json',
					data: formData,
					cache: false,
					encode: true,
					success: function(data){
						
						if(data.success == true){
							window.location.href = 'publicarSubasta.php?status=success';
						} else {
							window.location.href = 'publicarSubasta.php?status=fail';
						}//console.log(data);

					},
					error: function (xhr, ajaxOptions, thrownError) {
				        alert(xhr.status);
				        alert(thrownError);
				    }
				});
			
		}
	});

	/**
  	* @author ComFreek
  	* @license MIT (c) 2013-2015 ComFreek <http://stackoverflow.com/users/603003/comfreek>
  	* Please retain this author and license notice!
  	*/
	
	/*
	(function (exports) {
	    function valOrFunction(val, ctx, args) {
	        if (typeof val == "function") {
	            return val.apply(ctx, args);
	        } else {
	            return val;
	        }
	    }

	    function InvalidInputHelper(input, options) {
	        input.setCustomValidity(valOrFunction(options.defaultText, window, [input]));

	        function changeOrInput() {
	            if (input.value == "") {
	                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
	            } else {
	                input.setCustomValidity("");
	            }
	        }

	        function invalid() {
	            if (input.value == "") {
	                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
	            } else {
	               console.log("INVALID!"); input.setCustomValidity(valOrFunction(options.invalidText, window, [input]));
	            }
	        }

	        input.addEventListener("change", changeOrInput);
	        input.addEventListener("input", changeOrInput);
	        input.addEventListener("invalid", invalid);
	    }
	    exports.InvalidInputHelper = InvalidInputHelper;
	})(window);

	// Personalizar mensajes de validación HTML5

	InvalidInputHelper(document.getElementById("email"), {
	  
	  defaultText: "Por favor ingrese un email!",

	  defaultText: "Por favor ingrese un email!",

	  invalidText: function (input) {
	    return 'El email "' + input.value + '" es inválido!';
	  }
	});
	*/
})
