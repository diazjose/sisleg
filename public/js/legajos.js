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
	        		var persona = data.persona;
	        		$("#id_persona").val(persona[0].id);
	        		$("#name").val(persona[0].name);
	        		$("#surname").val(persona[0].surname);
	        		$("#email").val(persona[0].email);
	        		$("#dni").val(persona[0].dni);
	        		$("#address").val(persona[0].address);
	        		$("#phone").val(persona[0].phone);
	        	}else{
	        		$("#id_persona").val("");
	        		$("#name").val("");
	        		$("#surname").val("");
	        		$("#email").val("");
	        		$("#dni").val("");
	        		$("#address").val("");
	        		$("#phone").val("");
	        	}
	        }
	    });
	});

	var url = 'http://localhost/sisleg/public/legajos/legajoPDF/'+$("#legPdf").val();
	$("#pdf").attr('href',url);

	$("#cargo").click(function(){
		$("#cargoModal").modal('show');
		$(this).addClass('active')
	});

	var mapa = $("#umap").val();
	$("#mapa").append(mapa);

	$('#dni').keyup(function () { 
	    this.value = this.value.replace(/[^0-9]/g,'');
	    validDNI();
	});

	$('#persona').keyup(function () { 
	    this.value = this.value.replace(/[^0-9]/g,'');
	    validDNI();
	});
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

function editAsa(){
	var id = $("#idA").val();
	var fecha = $("#fechaA").val();
	var docu = $("#documentA").val();
	var	obs = $("#obsA").val();

	$("#aform").attr('action','http://localhost/sisleg/public/asamblea/update');
	$("#aTitle").text('Actualizar Asamblea');
	$("#abtn").text('Actualizar Asamblea');
	$("#abtn").removeClass('btn-primary');
	$("#abtn").addClass('btn-success');

	$("#afecha").val(fecha);
	$('#adocument option[value="'+ docu +'"]').attr("selected",true);
	$("#aobservacion").val(obs);
	$("#asam_id").val(id);
}

function newAsa(){
	$("#aform").attr("action",'http://localhost/sisleg/public/asamblea/create');
	$("#aTitle").text('Nueva Asamblea');
	$("#abtn").text('Nueva Asamblea');
	$("#abtn").removeClass('btn-success');
	$("#abtn").addClass('btn-primary');
	$("#afecha").val('');
	$("#aobservacion").val('');
}

function newCol(){
	$("#colform").attr("action",'http://localhost/sisleg/public/colaboracion/create');
	$("#colTitle").text('Nueva Colaboración');
	$("#colbtn").text('Nueva Colaboración');
	$("#colbtn").removeClass('btn-success');
	$("#colbtn").addClass('btn-primary');
	$("#colfecha").val('');
	$("#colobservacion").val('');
}

function editCol(id, fecha, observacion){
	$("#colform").attr("action",'http://localhost/sisleg/public/colaboracion/update');
	$("#colTitle").text('Actualizar Colaboración');
	$("#colbtn").text('Actualizar');
	$("#colbtn").removeClass('btn-success');
	$("#colbtn").addClass('btn-primary');
	$("#col_id").val(id);
	$("#colfecha").val(fecha);
	$("#colobservacion").val(observacion);
}