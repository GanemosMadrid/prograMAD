//document.ready
$(function(){

	$.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#objetivos-'+jsonObject.apuesta).append('<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});

	$.each(apuestas, function(id,area){	 
	var counter=0;   
	        $('#areas-container').append('<div class="col-xs-12 col-sm-3"  id="col-'+id+'"> \
			    	<div id="columna-'+counter+'">\
	                	<div class="titulo-apuesta "> <h3> <a href="apuesta.php?apuesta='+id+'">'+area.titulo+' </a>  </h3> </div> \
	                	<div class="objetivos-container" id="objetivos-'+id+'"> \
	                	</div>\
	            	</div>\
	            </div>	');
	        	//<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	        counter++;
	});

    $.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#objetivos-'+jsonObject.apuesta).append('<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});


	/* sidebar
	$.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#enlaces-sidebar').append('<a href="sector.php?sector='+jsonObject.apuesta+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});*/

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