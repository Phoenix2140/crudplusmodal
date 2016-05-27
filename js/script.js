$(document).ready(function() {
	$("#btn-enviar").click(function(e) {
		e.preventDefault();
		var pet = $("form").attr("action");
		var met = $("form").attr("method");

		$.ajax({
		  url: pet,
		  type: met,
		  data: $("form").serialize(),
		  beforeSend: function(data){
		  	var salida = '<img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" class="img-responsive" alt="Image">';
		  	$("#resultado").html("");
		  	$("#loading").html(salida);
		  	// alert("Cargando");
		  },
		  success: function(info) {
		  	$("#loading").html("");
		    $("#resultado").html(info);
		  }

		});
		
	});

	// El resto de funciones de ajax están enla API: http://jqapi.com/#p=jQuery.ajax
	/**
	*accepts: 
	* 
	*/
});