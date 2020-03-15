window.addEventListener("load", function(){
	$("#buscar").on("keyup", function(){
		var buscar = $(this).val();
		var form = $("#form-search");
		var url = form.attr('action');
		$("#form_buscar").val(buscar);
		var data = form.serialize();
		$.ajax({          
	        url: 'expedientes/buscar',
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	$("#tbody").remove('tr');
	            $("#tbody").html(data);
	        }
	    });
	});
	$("#buscar_area").on("keyup", function(){
		var buscar = $(this).val();
		console.log(buscar);
		var form = $("#form-search");
		var url = form.attr('action');
		$("#form_buscar").val(buscar);
		var data = form.serialize();
		$.ajax({          
	        url: 'buscar_area',
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	$("#tbody").remove('tr');
	            $("#tbody").html(data);
	        }
	    });
	});

	$(".area").each(function(){
		var rol = $(this).text();
		var text = rol.replace('_',' ');
		$(this).text(text);	
	});
	
})

function datos(status){
	$("#estado option[value="+ status +"]").attr("selected",true);
};

function abrirSeg(lugar,status, ini, fin, id){	
	$("#mod-seg").removeClass('bg-success');
	$("#mod-seg").removeClass('bg-danger');
	$("#mod-seg").removeClass('bg-warning');
	$("#mod-seg").addClass('bg-'+status);
	var title = lugar.replace('_',' ');
	$("#lugar").text(title);
	$("#ini").text(ini);
	$("#fin").text(fin);
	var tex = $("#lugar"+id).val();	
	switch(status) {
	  case 'success':
	    $("#obs").text('APROBADO');
	    break;
	  case 'danger':
	    $("#obs").text(tex);
	    break;
	  case 'warning':
	   	$("#obs").text('EN REVISION');	
	    break;  
	}
		
}