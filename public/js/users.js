window.addEventListener("load", function(){
	
});
function edit(id,name,surname,role,email){
	
	console.log(id+' '+name+' '+surname+' '+email+' '+role);
	$("#user_id").val(id);
	$("#name").val(name);
	$("#surname").val(surname);
	$("#role option[value="+ role +"]").attr("selected",true);
	$("#email").val(email);
};

function Borrar(id,name,surname){
	console.log(id+' '+name+' '+surname);
	$("#nombre").text(name+' '+surname);
	$("#user").val(id);
	$("#user_name").val(name+' '+surname);
}


