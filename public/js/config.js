window.addEventListener("load", function(){
	

});

function edit(oficina,config,tramite,inicio,fin,min){
	$("#eoficina").val(oficina);
	$("#econfig").val(config);
	$('#etramite_id').val(tramite);
	$("#ehora_inicio").val(inicio);
	$("#ehora_fin").val(fin);
	$("#emin_turno").val(min);
}

function Borrar(oficina,tramite,name){
	$("#nombre").text(name);
	$("#oficina").val(oficina);
	$("#config").val(tramite);
	$("#name").val(name);
}
