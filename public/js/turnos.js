window.addEventListener("load", function(){
	autoVan();
	setTimeout(autoViene, 5000);

	setTimeout(refrescar, 120000);

	$("#form-turno").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
	/*
	$("#fecha").change(function(){
		validFecha();
	});
	*/

	$('#dni').keyup(function () { 
	    this.value = this.value.replace(/[^0-9]/g,'');
	    validDNI();
	});

	$("#lugar").change(function(){
		var	valor = $(this).val(); 
		if (valor != 1) {
			if($(this).val() != 'Casa Central(Av. Rivadavia N° 890)') { 
				$("#tipo .casa").each(function() {
				    $(this).remove();
				});
			}else{
				$("#tipo").append('<option class="casa">DNI - Pasaportes</option><option class="casa">Autenticaciones</option><option class="casa">Solicitud de Actas</option><option class="casa">Inscripcion Judicial</option><option class="casa">Union Convivencial</option>');
			}
			$("#tramite").show();
		}
	});

	$("#tramite").change(function(){		
  		$("#btn").removeClass('disabled',false);
	});

	/*

	$("#btn").click(function(){

		var vdni = $("#dni").val();
		var vemail = $("#email").val();
		var vfecha = $("#fecha").val();
		validEmail();
		var email = validEmail();
		if (vdni != '' && vemail != '' && vfecha != '' && email != 0) {
			validFecha();

			if ($("#btn").hasClass("desabled") == false) {
				var form = $("#form-turno");
				var data = form.serialize();
				$.ajax({          
			        url: 'turno/create',
			        type: 'POST',
			        data : data,
			        success: function(data){
			        	var date = data.fecha;
						var info = date.split('-');
	  					$("#turno-dni").text(data.dni);
			        	$("#turno-orden").text(data.orden);
			        	$("#turno-dia").text(info[2] + '/' + info[1] + '/' + info[0]);
			        	$("#turno-hora").text(data.hora);
			        	$("#turno-tipo").text(data.tipo);
			        	$("#turno").show();
			        	$("#btn").addClass('disabled');
			        	$("#btn-descargar").attr('href','turno/download/'+data.id+'/'+data.orden);
			        	$("#btn-descargar").attr('target','_block');
			        	$("#turno-solicitud").hide();
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
	 */   
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

function validFecha(){
		var dni = $("#dni").val();
		var fecha = $("#fecha").val();
		
		var form = $("#form-search");
		var url = form.attr('action');
		$("#turnDni").val(dni);
		$("#turnFecha").val(fecha);
		var data = form.serialize();

		$.ajax({          
	        url: url,
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	if (data == 1) {
	        		$("#btn").removeClass('disabled');	        		
	        	}else{
	        		$("#btn").addClass('disabled');
	        		$("#btn").attr('disabled',false);
	        		$("#message").text(data);
	        		$("#exampleModal").modal();
	        	}
	        }
	    });

}
function validDNI(){
	if ($("#dni").val().length == 8) {
		$("#email").attr('disabled', false);
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

	var form = $("#form-turno");
	var url = form.attr('action');
	var data = form.serialize();
	$.ajax({          
	    url: url,
	    type: 'POST',
	    data : data,
	    success: function(data){
	    	if (data == 0) {
	     		$("#message").text('No tiene turno Hoy')
	     		$("#turno").hide();
	     		$("#no-turno").show();
	     	}else{
	     		var date = data[0].fecha;
				var info = date.split('-');
	     		$("#turno-dni").text(data[0].dni);
			    $("#turno-orden").text(data[0].orden);
			    $("#turno-dia").text(info[2] + '/' + info[1] + '/' + info[0]);
			    $("#turno-hora").text(data[0].hora);
			    $("#turno-tipo").text(data[0].tipo);
			    $("#no-turno").hide();	
			    $("#turno").show();	
	     	}
	     	$("#dni").val('');
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