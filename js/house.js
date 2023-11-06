$(document).ready(function(){
 dragAndDrop(".card", ".answer");
  dragAndDrop(".card", ".option");
  //$(".ui-draggable-handle").attr("style",0);
});
function dragAndDrop(dragTarget, dropTarget) {


    // Enable draggable events...
    $(dragTarget).draggable({ revert: true });

    // Enable the droppable events...
    $(dropTarget).droppable({
      drop: function(event, ui) {
        // Append the dropped item into its drop target...
        $(this).append(ui.draggable);
         if(ui.draggable.parent().hasClass("techo_gris"))
            ui.draggable.parent().removeClass("techo_gris");
         else
            $(".techo").addClass("techo_gris");
        // Place the drag target in the normal document flow...
        
        if($.trim($(".techo").html()).length==0){
          if(ui.draggable.attr("id")=="techo")
            $(".techo").addClass("techo_gris");
        }
        else{
          if(ui.draggable.attr("id")!="techo")
            $(".techo").removeClass("techo_gris");
          }


        $("#sectionPiezas").find(".techo").removeClass("techo_gris");
        $("#sectionPiezas").find("i").remove();
        //console.log(ui.draggable.attr("id"));
        ui.draggable.css({
          position: "static",
          top: "auto",
          left: "auto"
        });
        // jQuery UI requires the draggable element to have position: relative...
        ui.draggable.css({
          position: "relative"
        });

        //$(".ui-draggable-handle").attr("style",0);
      }
    });
  }

  $(document).on("click", ".youtube", "", function(){
  	$(".answer").each(function(){
  		if($(this).find(".card").hasClass($(this).attr("id"))){
  			$(this).addClass("b-green").removeClass("b-red");
        $(this).find(".flagresultado").html('<i class="fa fa-check-square c-success" aria-hidden="true"></i>');

  		}
  		else{
  			$(this).addClass("b-red").removeClass("b-green");
        $(this).find(".flagresultado").html('<i class="fa fa-exclamation-triangle c-error" aria-hidden="true"></i>');
  		}
  	})
  })