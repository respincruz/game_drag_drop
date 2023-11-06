// function para cargar los elementos de la página
$(document).ready(function(){
	fnSecciones();
	fnRespuestas();
})

function fnSecciones(){
	$.ajax({
        url: 'hub/hub.php',
        data: { "funcion": "fnParesConceptos",
        		
              },
           type: 'POST',
        dataType: 'html',
        cache:false,
        async:false
         }).done(function(data){
         	$("#divBloqueGrupos").html(data);
         });
}

function fnRespuestas(){
	$.ajax({
        url: 'hub/hub.php',
        data: { "funcion": "fnRespuestas"
        		
              },
           type: 'POST',
        dataType: 'html',
        cache:false,
        async:false
         }).done(function(data){
         	$("#divRespuestas").html(data);
         	 dragAndDrop(".card", ".answer");
  			 dragAndDrop(".card", ".option");
         });	
}

function dragAndDrop(dragTarget, dropTarget) {


    // Enable draggable events...
    $(dragTarget).draggable({ revert: true });

    // Enable the droppable events...
    $(dropTarget).droppable({
      drop: function(event, ui) {
        // Append the dropped item into its drop target...
        $(this).append(ui.draggable);
        // Place the drag target in the normal document flow...
        $(".answer").each(function(){
        	if($(this).find(".card").length>0)
        		$(this).addClass("formulation");
        	else
        		$(this).removeClass("formulation");
        });

        ui.draggable.css({
          position: "static",
          top: "auto",
          left: "auto"
        });
        // jQuery UI requires the draggable element to have position: relative...
        ui.draggable.css({
          position: "relative"
        });
      }
    });
  }


  $(document).on("click", ".youtube", "", function(){
  	$(".mc-description").each(function(){
  		var intCorrectas=0;
  		var intError=0;
	  	$(this).find(".answer").each(function(){
	  		if($(this).find(".card").length>0){
	  			if($(this).data("grupo_id")==$(this).find(".card").data("grupo")){
	  				intCorrectas++;
	  			}
	  			else
	  				intError++;
	  		}
	  		
	  	})
	  	$(this).parent().parent().find(".bg-success").find("strong").text(intCorrectas);
	  	$(this).parent().parent().find(".bg-error").find("strong").text(intError);
	  console.log(intCorrectas);
	  console.log(intError);

  	})
  	
  })