$(document).ready(function(){
	 $.ajax({
        url: 'hub/hub.php',
        data: { "funcion": "fnViewZonas",
        		
              },
           type: 'POST',
        dataType: 'html',
        cache:false, 
        async:false
         }).done(function(data){
         	$("#sectionGame").html(data);
         });

  dragAndDrop(".card", ".answer");
  dragAndDrop(".card", ".option");
})

  $(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });


function dragAndDrop(dragTarget, dropTarget) {


    // Enable draggable events...
    $(dragTarget).draggable({ revert: true });

    // Enable the droppable events...
    $(dropTarget).droppable({
      drop: function(event, ui) {
        // Append the dropped item into its drop target...
        $(this).append(ui.draggable);
        // Place the drag target in the normal document flow...
       
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
  	$(".answer").each(function(){
  		if($(this).data("idzona")==$(this).find("img").data("idimage")){
  			$(this).addClass("b-green").removeClass("b-red");
        $(this).find(".flagresultado").html('<i class="fa fa-check-square c-success" aria-hidden="true"></i>');

  		}
  		else{
  			$(this).addClass("b-red").removeClass("b-green");
        $(this).find(".flagresultado").html('<i class="fa fa-exclamation-triangle c-error" aria-hidden="true"></i>');
  		}
  	})
  })
  		



