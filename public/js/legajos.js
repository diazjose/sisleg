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
	        		$("#address").val(persona[0].address);
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

	var mapa = $("#umap").val();
	$("#mapa").append(mapa);
})

function edit(num,tipo,denominacion,zona,juri,dir,ubicacion,resolucion,fecha){
	$("#numero").val(num);
	$('#tipo option[value="'+ tipo +'"]').attr("selected",true);
	$("#denominacion").val(denominacion);
	$('#juridiccion option[value="'+ juri +'"]').attr("selected",true);
	$("#direccion").val(dir);
	$('#zona option[value="'+ zona +'"]').attr("selected",true);
	$("#ubicacion").val(ubicacion);
	$("#resolucion").val(resolucion);
	$("#fecha_inicio").val(fecha);
}

function Borrar(id,leg,name,surname){
	
	$("#nombre").text(name+' '+surname);
	$("#cargo_id").val(id);
	$("#leg").val(leg);
	
}