$(document).ready(function() {
  // Set the initial score to zero...
  var score = 0;
  // Create an array with the answers in the correct order...
  var answers = [
    "Short-term supply of energy.",
    "Needed for growth and repair of cells.",
    "Long-term store of energy.",
    "Needed to maintain health.",
    "Needed to maintain health."
  ];
  // Get the intial state of the table, so it can be reset...
  var tableDefault = $(".table").html();

  // Enable drag and drop...
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
  // Enable drag and drop in both directions...
  dragAndDrop(".card", ".answer");
  dragAndDrop(".card", ".option");

  // When the check answers button is clicked...
  $(".check-answer").on("click", function() {
    
    // Check the guess against each answer in the answers array, and increment the score if they match...
    $(".answer").each(function(i) {
      
      // Get the correct answer for the current row...
      var answer = answers[i];
      // Get the user's guess...
      var guess = $(this).find("div").text();
      // Compare the user's guess to the correct answer...
      if (guess === answer) {
        // They were correct - increment the score!
        score++;
        // Correct answer gets a green background...
        $(this).css("background", "#2ecc71");
      } else {
        // Incorrect answers get a red background...
        $(this).css("background", "#e74c3c");
      }
    });
    // Display the score...
    $(".score-card").html("<p>Score: " + score + "/5</p>");

    // Swap the "check answers" and "reset" buttons...
    $(".reset-btn").css("display", "flex");
    $(".check-answer").css("display", "none");
  }); // END $(".check-answer").on("click", function({...}));

  // When the reset button is clicked...
  $(".reset-btn").on("click", function() {
    
    // Reset the question table...
    $(".table").html(tableDefault);
    
    // Re-enable the drag and drops...
    dragAndDrop(".card", ".answer");
    dragAndDrop(".card", ".option");

    // Swap the "check answers" and "reset" buttons...
    $(".reset-btn").css("display", "none");
    $(".check-answer").css("display", "flex");

    // Hide the score...
    $(".score-card").html("");

    // Reset the score to zero...
    score = 0;
  }); // END $(".reset-btn").on("click", function() {...});
}); // END $(document).ready(function() {...});
