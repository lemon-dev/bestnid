	$(document).ready(function() {
    
	// Side-nav initialize
	$(".button-collapse").sideNav();  
	$('.collapsible').collapsible();
	
	// Select initialize
	$('select').material_select();

	// Form validation

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
					alert("El usuario "+ error.user + " ya existe");
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        alert(xhr.status);
		        alert(thrownError);
		      }
		});
	});

	$("form").submit(function (event) {
		event.preventDefault();

		var nombre = $.trim($('#nombre').val());
		var apellido = $.trim($('#apellido').val());
		var dni = $.trim($('#dni').val());
		var email = $.trim($('#email').val());
		var nombre_usuario = $.trim($('#nombre_usuario').val());
		var password = $.trim($('#password').val());
		var tarjeta = $.trim($('#tarjeta').val());

		if(nombre == '' || apellido == '' || dni == '' ||
			email == '' || nombre_usuario == '' || 
			password == '' || tarjeta == '') {
			
			window.alert("Por favor llene todos los campos.");
		
		} else {

			if(password != val_password){
				window.alert("Las contraseñas no coinciden, vuelva a ingresarla");
				$("#password").html('');
				$("#val_password").html('');
			
			} else {

				formData = $(this).serialize();	
		
				$.ajax({
					method: "POST",
					url: "function/form_process.php",
					dataType: 'json',
					data: formData,
					cache: false,
					encode: true,
					success: function(data){

						$('#register-result').html('');
						$('#register-result').append(data);
					
					}
				});
				return false;
			}
		}
	});

	/**
  	* @author ComFreek
  	* @license MIT (c) 2013-2015 ComFreek <http://stackoverflow.com/users/603003/comfreek>
  	* Please retain this author and license notice!
  	*/
	
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
})