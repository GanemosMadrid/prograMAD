//document.ready
$(function(){
	/*$.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#objetivos-'+jsonObject.apuesta).append('<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});*/

//genera apuestas bajo el contenidor #areas-container
	$.each(apuestas, function(id,area){	 
	var counter=0;   
	        $('#areas-container').append('<div class="col-xs-12 col-sm-3"  id="col-'+id+'"> \
			    	<div id="columna-'+counter+'">\
	                	<div class="titulo-apuesta "> <h3> <a href="apuesta.php?apuesta='+id+'">'+area.titulo+' </a>  </h3> </div> \
	                	<div class="objetivos-container" id="objetivos-'+id+'"> \
	                	</div>\
	            	</div>\
	            </div>	');
	        	counter=counter+1;
	        	//<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	        
	});
	

//genera objetivos bajo cada apuestas
    $.each(listobjetivos.objetivos, function(index,jsonObject){	    
	        $('#objetivos-'+jsonObject.apuesta).append('<a href="sector.php?sector='+jsonObject.id+'"><div class="objetivo"> ' +jsonObject.titulo+'</div></a>');	   
	});
	$('#objetivos-economia-empleo').append('<a href="sector.php?sector=sin-categoria">\
	        	<div class="objetivo" style="margin-top:4em; text-shadow:none; border:none; background-color:#444; color:white"> Propuestas de usuarios enviadas sin categorizar</div></a>')


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