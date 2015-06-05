$("span").hide();

$(document).ready(function() {
    
	// Side-nav initialize
	$(".button-collapse").sideNav();  
	$('.collapsible').collapsible();
	
	// Select initialize
	$('select').material_select();

	// Form validation

	// Loguearse

	// Verifico el nombre de usuario
	$('#login-submit').submit(function (event) {
		// Si esta vacio
		alert("entro");
		event.preventDefault();
		var nombre_usuario = $('#usuario').val();
		var password = $('#password').val();

		if(nombre_usuario == "" || password == ""){
			alert("Debe llenar todos los campos");
		} else {

			postData = {
				nombre: 	nombre_usuario,
				pass: 		password 
			};

			$.ajax({
				method: "POST",
				url: "/db/ajax_user_validate.php",
				dataType: 'json',
				data: postData,
				encode: true,
				success: function(){

				},
				error: function(xhr, ajaxOptions, thrownError) {
		       		alert(xhr.status);
		        	alert(thrownError);
		        }
			})
		}
	});

	// Verifico la contraseña
		// Si esta vacía
			// La solicito
		// Sino
			// Valido con el usuario
	//



	$("#usuario").blur(function () {
		if($(this).val() == '') {
			$('#name-hint').html('Ingrese su nombre de usuario');
			$('#name-hint').show();
		} else {
			$('#name-hint').hide();
		}
	});

	$("#password").blur(function () {
		if($(this).val() == '') {
			$('#log-pass-hint').html('Ingrese su contraseña por favor');
			$('#log-pass-hint').show();
		} else {
			$('#log-pass-hint').hide();
		}
	});

	// Registrar

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
					$("#register-form #user-hint").show();
				} else {
					$("#register-form #user-hint").hide();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        alert(xhr.status);
		        alert(thrownError);
		      }
		});
	});

	$("#val_password").blur(function (){

	});

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
			
			//Mostrar todos los campos
			window.alert("Por favor llene todos los campos.");
		
		} else {

			if(password != val_password){
				
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
						alert('success');
						$("#register-form");
					}
				});

				window.location.href = 'index.php';
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