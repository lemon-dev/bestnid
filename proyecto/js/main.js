$(document).ready(function() {
    
	// Side-nav initialize
	$(".button-collapse").sideNav();  
	$('.collapsible').collapsible();
	
	// Select initialize
	$('select').material_select();

	// Form submission

	/*
	$("#register-submit").click(function() {
		var form = $("#register-form");

		var formMessages = $("#form-messages");

		$($form).submit(function(event) {
			event.preventDefault();
		})

		var formData = $(form).serialize();

		$.ajax({
		    type: 'POST',
		    url: $(form).attr('action'),
		    data: formData
		}).done(function(response) {
		    
		    // Make sure that the formMessages div has the 'success' class.
		    $(formMessages).removeClass('error');
		    $(formMessages).addClass('success');

		    // Set the message text.
		    $(formMessages).text(response);

		    // Clear the form.
		    $('#nombre').val('');
		    $('#apellido').val('');
		    $('#dni').val('');
		    $('#nombre_usuario').val('');
		    $('#contraseña').val('');
		}).fail(function(data) {
		    
		    // Make sure that the formMessages div has the 'error' class.
		    $(formMessages).removeClass('success');
		    $(formMessages).addClass('error');

		    // Set the message text.
		    if (data.responseText !== '') {
		        $(formMessages).text(data.responseText);
		    } else {
		        $(formMessages).text('Oops!');
		    }
		});
	})*/

	// Form validation

	$("#register-submit").click(function () {

		var nombre = document.getElementById("nombre").value;
		var apellido = document.getElementById("apellido").value;
		var dni = document.getElementById("dni").value;
		var nombre_usuario = document.getElementById("nombre_usuario").value;
		var password = document.getElementById("password").value;

		if(nombre == '' || apellido == '' || dni == '' ||
			nombre_usuario == '' || password == '')	{
			window.alert("Por favor llene todos los campos.");
		} else {
			$.ajax({
				method: "POST",
				url: "register.php",
				data: datastring,
				cache: false,
				success: function(result){
					alert(result);
				}
			});
		}
		return false;
	});
})