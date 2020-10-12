window.addEventListener("load", function(){
	

});

function edit(id,denominacion,direccion,telefono){
	$("#id").val(id);
	$("#edenominacion").val(denominacion);
	$("#edireccion").val(direccion);
	$("#etelefono").val(telefono);
};

function Borrar(id,name){

	console.log(id+' '+name);
	$("#nombre").text(name);
	$("#oficina").val(id);
	$("#name").val(name);
}


