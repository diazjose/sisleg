window.addEventListener("load", function(){
	autoVan();
	setTimeout(autoViene, 5000);

	setTimeout(refrescar, 180000);

	$("#form-turno").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
	
	$('#dni').keyup(function () { 
	    this.value = this.value.replace(/[^0-9]/g,'');
	    validDNI();
	});

	$("#oficina").change(function(){
		var buscar = $(this).val();
		var form = $("#form-search");
		var url = form.attr('action');
		$("#id").val(buscar);
		var data = form.serialize();	
		$.ajax({          
			url: url,
			type: 'POST',
			data : data,
			success: function(data){
				$("#tramite").html('');
				$("#tramite").append(data);
			}	
		});

		$("#tipo").show();
		
	});

	$("#tramite").change(function(){		
  		$("#btn").removeClass('disabled',false);
	});

	$("#fechaTurno").click(function(){
		var fecha = $("#fecha").val();		
		var url = 'http://localhost/sisgturn/public/turno/todos/'+fecha;
		$(location).attr('href',url);
	});

	$("#btn").click(function(){
		
		var vdni = $("#dni").val();
		var vtramite = $("#tramite").val();
		var ente = $("#ente").val();

		if (vdni != '' && vtramite != '' && ente != '') {
			$("#turno-solicitud").hide();
			if ($("#btn").hasClass("disabled") == false) {
				var form = $("#form-turno");
				var data = form.serialize();
				$.ajax({          
			        url: 'turno/create',
			        type: 'POST',
			        data : data,
			        beforeSend: function(objeto){
				        $('#spinner').show();
				    },	
			        success: function(data){
			        	//console.log(data);
			        	setTimeout(function(){
				          	$('#spinner').hide();
				        	var date = data[0].fecha;
							var info = date.split('-');
							$("#alert").addClass('alert-'+data[4]);
							$("#border-turno").addClass('border-'+data[4]);
							$("#title-alert").text(data[3])
		  					$("#turno-dni").text(data[0].dni);
		  					$("#turno-oficina").text(data[1]);
				        	$("#turno-orden").text(data[0].orden+'°');
				        	$("#turno-dia").text(info[2] + '/' + info[1] + '/' + info[0]);
				        	$("#turno-hora").text(data[0].hora);
				        	$("#turno-tipo").text(data[2]);
				        	$("#turno").show();
				        	$("#btn").addClass('disabled');
				        	$("#btn-descargar").attr('href','turno/download/'+data[0].id+'/'+data[0].orden);
				        	$("#btn-descargar").attr('target','_block');
				        }, 2000); 
			        }
			    });
			}else{
				var info = vfecha.split('-');
				$("#btn").addClass('disabled');
	        	$("#message").text('¡¡ Este DNI ya tiene un turno el dia '+info[2] + '/' + info[1] + '/' + info[0]+' !!');
	        	$("#exampleModal").modal();
			}    
		}else{
			$("#message").text('Debe completar todos los campos');
	        $("#exampleModal").modal();
		}   
	});
});

function autoVan(){
	$('div#box1').animate({
	      left: '+=675px',
	      //right: '+=500px;'
	}, 5000);
	$('div#box2').animate({
	      left: '-=675px',
	}, 5000);
}
function autoViene(){
	$('div#box1').animate({
	      left: '-=675px',
	      //right: '+=500px;'
	}, 4000);
	$('div#box2').animate({
	      left: '+=675px',
	}, 4000);
}

function refrescar(){
    //Actualiza la página
    location.reload();
  }



function validTurno(){
		var dni = $("#dni").val();		
		var form = $("#form-ValidTurno");
		var url = form.attr('action');
		$("#validDni").val(dni);
		var data = form.serialize();
		$.ajax({          
	        url: url,
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	//console.log(data);
	        	return data;
	        		/*
	        		$("#btn").addClass('disabled');
	        		$("#btn").attr('disabled',false);
	        		$("#message").text(data);
	        		$("#exampleModal").modal();
	        		*/
	        }
	    });

}
function validDNI(){
	var valid = $("#dni").val();
	if (valid.length == 8) {
		if (valid > 6000000 && valid < 40000000) {
			$("#btn").removeClass('disabled');
			$("#dni").removeClass('is-invalid');
			$("#dnilHelp").show();
		}else{
			$("#btn").addClass('disabled');
			$("#dni").addClass('is-invalid');
			$("#dnilHelp").hide();
			$("#mess").show();
		}
	}else{
		$("#mess").hide();
		$("#btn").addClass('disabled');
	}
}

function validEmail(){
	if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
		$("#message").text('El correo electrónico introducido no es correcto.');
	    $("#exampleModal").modal();
        return 0;
    }
}

function btnsearch(){
	$("#no-turno").hide();
	$("#turno").hide();
	var form = $("#form-turno");
	var url = form.attr('action');
	var data = form.serialize();
	$.ajax({          
	    url: url,
	    type: 'POST',
	    data : data,
	    beforeSend: function(objeto){
		       $('#spinner').show();
		},	
		success: function(data){
		   	setTimeout(function(){
		   		$('#spinner').hide();
				if (data == 0) {
		     		$("#message").text('No tiene turno Hoy')
		     		$("#no-turno").show();
		     	}else{
		     		var date = data[0].fecha;
					var info = date.split('-');
					$("#turno-dni").text(data[0].dni);
		  			$("#turno-oficina").text(data[0].oficina.denominacion);
				    $("#turno-orden").text(data[0].orden+'°');
				    $("#turno-dia").text(info[2] + '/' + info[1] + '/' + info[0]);
				    $("#turno-hora").text(data[0].hora);
				    $("#turno-tramite").text(data[0].tramite.denominacion);
				    $("#turno").show();
				    /*
		     		var date = data[0].fecha;
					var info = date.split('-');
		     		$("#turno-dni").text(data[0].dni);
				    $("#turno-orden").text(data[0].orden);
				    $("#turno-dia").text(info[2] + '/' + info[1] + '/' + info[0]);
				    $("#turno-hora").text(data[0].hora);
				    $("#turno-tipo").text(data[0].tipo);
				    ;*/	
		     	}
		     	$("#dni").val('');
		    }, 2000);
	    }
	});	
}

function btnAtendido(id, status){
	var form = $("#form-turno");
	var url = form.attr('action');
	$("#turno").val(id);
	$("#estado").val(status);
	var data = form.serialize();

	$.ajax({          
	    url: url,
	    type: 'POST',
	    data : data,
	    success: function(data){
	     	location.reload(); 	
	    }
	});
}

function alpha(e) {
  var k; document.all ? k = e.keyCode : k = e.which; 
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57)); 
} 