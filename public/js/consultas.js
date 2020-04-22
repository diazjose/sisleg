window.addEventListener("load", function(){
	
	var tipo = $("#poti").text();
	if($("#juri").text() != ''){
		var juri = $("#juri").text();	
	}else{
		var juri = 'todos';
	}
	if($("#nazo").text() != ''){
		var zona = $("#nazo").text();	
	}else{
		var zona = 'todos';
	}
	if($("#estado").text() != ''){
		var mandato = $("#estado").text();	
	}else{
		var mandato = 'todos';
	}
	console.log(tipo+' '+juri+' '+zona+' '+mandato); 

	var url = 'http://localhost/sisleg/public/reportes/'+tipo+'/'+juri+'/'+zona+'/'+mandato;
	$("#pdf").attr('href',url);

	$("#juridiccion").change(function(){
		console.log($(this).val());
		if($(this).val() != 'todos'){
			$("#zona-select").show();
		}else{
			$("#zona-select").hide();
		}
	});

	$("#consultar").click(function(){
		var juri;
		var zona;
		var mandato;
		var tipo = $("#tipo").val();
		var i=1;
		$(".search").each(function(){
			switch(i) {
			  case 1:
			    juri = $(this).val();
			    break;
			  case 2:
			    zona = $(this).val();
			    break;
			  case 3:
			    mandato =$(this).val();
			    break;
			} 
			i++;
		});

		console.log(i+' '+juri+' '+zona+' '+mandato);
		
		var url = 'http://localhost/sisleg/public/consultas/'+tipo+'/'+juri+'/'+zona+'/'+mandato;
		$(location).attr('href',url);
	});
});


