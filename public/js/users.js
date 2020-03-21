window.addEventListener("load", function(){
	$(".role").each(function(){
		var rol = $(this).text();
		var text = rol.replace('_',' ');
		$(this).text(text);	
	});

	$("#buscar").on("keyup", function(){
		var buscar = $(this).val();
		var form = $("#form-search");
		var url = form.attr('action');
		$("#form_buscar").val(buscar);
		var data = form.serialize();
		$.ajax({          
	        url: 'usuarios/	buscar',
	        type: 'POST',
	        data : data,
	        success: function(data){
	        	$("#tbody").remove('tr');
	            $("#tbody").html(data);
	            console.log(data);
	        }
	    });
	});

});
function edit(id,name,surname,role,email){
	
	console.log(id+' '+name+' '+surname+' '+email+' '+role);
	$("#user_id").val(id);
	$("#name").val(name);
	$("#surname").val(surname);
	$('#role option[value="'+ role +'"]').attr("selected",true);
	$("#email").val(email);
};

function Borrar(id,name,surname){
	console.log(id+' '+name+' '+surname);
	$("#nombre").text(name+' '+surname);
	$("#user").val(id);
	$("#user_name").val(name+' '+surname);
}


