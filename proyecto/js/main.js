$(document).ready(function() {
    
	// Side-nav initialize
	$(".button-collapse").sideNav();  
	$('.collapsible').collapsible();
	
	// Select initialize
	$('select').material_select();

	// Form validation

	$("form").submit(function (event) {

		/*
		var nombre = document.getElementById("nombre").value;
		var apellido = document.getElementById("apellido").value;
		var dni = document.getElementById("dni").value;
		var nombre_usuario = document.getElementById("nombre_usuario").value;
		var password = document.getElementById("password").value;

		if(nombre == '' || apellido == '' || dni == '' ||
			nombre_usuario == '' || password == '')	{
			window.alert("Por favor llene todos los campos.");
		} else {

		}
			*/

		formData = $(this).serialize();	
		
		$.ajax({
			method: "POST",
			url: "function/form_process.php",
			dataType: 'json',
			data: formData,
			cache: false,
			encode: true,
			success: function(data){
				alert(data);
				$('#register-result').html('');
				$('#register-result').append(data);
			}
		});
		event.preventDefault();
		return false;
	});
})