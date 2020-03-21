window.addEventListener("load", function(){
	$("#buscar").on("keyup", function(){
		var buscar = $(this).val();
		var form = $("#form-search");
		var url = form.attr('action');
		$("#form_buscar").val(buscar);
		var data = form.serialize();
		$.ajax({          
	        url: 'legajos/buscar',
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	$("#tbody").remove('tr');
	            $("#tbody").html(data);
	        }
	    });
	});

	$("#bus_per").click(function(){
		var dni = $("#persona").val();
		var form = $("#form-search");
		var url = form.attr('action');
		$("#form_buscar").val(dni);
		var data = form.serialize();
		$.ajax({          
	        url: '../../personas/buscar',
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	if(data.status == 'success'){
	        		console.log('si');
	        		var persona = data.persona;
	        		$("#id_persona").val(persona[0].id);
	        		$("#name").val(persona[0].name);
	        		$("#surname").val(persona[0].surname);
	        		$("#email").val(persona[0].email);
	        		$("#dni").val(persona[0].dni);
	        		$("#adress").val(persona[0].adress);
	        		$("#phone").val(persona[0].phone);
	        	}else{
	        		console.log('no');
	        	}
	        }
	    });
	});

	$("#cargo").click(function(){
		$("#cargoModal").modal('show');
		$(this).addClass('active')
	});
})

function edit(num,tipo,denominacion,juri,dir,resolucion,fecha){
	$("#numero").val(num);
	$('#tipo option[value="'+ tipo +'"]').attr("selected",true);
	$("#denominacion").val(denominacion);
	$('#juridiccion option[value="'+ juri +'"]').attr("selected",true);
	$("#direccion").val(dir);
	$("#resolucion").val(resolucion);
	$("#fecha_inicio").val(fecha);
}