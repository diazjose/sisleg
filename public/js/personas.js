window.addEventListener("load", function(){
	
	$("#buscar").on("keyup", function(){
		var buscar = $(this).val();
		var form = $("#form-search");
		var url = form.attr('action');
		$("#form_buscar").val(buscar);
		var data = form.serialize();
		$.ajax({          
	        url: 'personas/find',
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	$("#tbody").remove('tr');
	            $("#tbody").html(data);
	            console.log(data);
	        }
	    });
	});

	var tipo = $("#mtip").val();
	$('#mtipo option[value="'+ tipo +'"]').attr("selected",true);
});


