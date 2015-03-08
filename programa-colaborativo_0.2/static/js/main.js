//document.ready
$(function(){

    $.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#objetivos-'+jsonObject.apuesta).append('<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});


	/* sidebar*/
	$.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#enlaces-sidebar').append('<a href="sector.php?sector='+jsonObject.apuesta+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});

	/*enviar nueva propuesta*/
	if (typeof distritos != 'undefined') {
		$.each(distritos, function(index,jsonObject){	    
		        $('#distritoSelect').append('<option value="'+index+'">'+ jsonObject+ '</option>');	   
		});
	}

	
});

function getObjetivo(mid){
	//console.log(mid)
	var var1=null;
	$.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        if(jsonObject.id == mid) var1=jsonObject;
	});
	return var1;

}