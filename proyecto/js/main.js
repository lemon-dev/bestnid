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
				
				$("#register-form #pass-hint").html('Las contraseñas no coinciden, vuelva  intentarlo');
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
