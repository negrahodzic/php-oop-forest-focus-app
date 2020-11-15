function startTimer(min) {
  var minutes = min;
  var now = new Date();
  var countDownDate = new Date(now);
  countDownDate.setMinutes(now.getMinutes() + minutes);

  // Update the count down every 1 second
  var x = setInterval(function () {
    // Show appropriate buttons
    $("#remove").hide();
    $("#start").hide();
    $("#give_up").show();

    // Notify user that tree is growing
    document.getElementById("status").value = "Tree is growing!";
    
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML = hours + "h "
      + minutes + "m " + seconds + "s ";

    // When countdown is finsihed
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("timer").innerHTML = "Successfully planted your tree!";
      document.getElementById("status").value = "Planted";
      updateStatus("Planted");
      $("#give_up").hide();
    }
  }, 1000);
}

function updateStatus(status) {
  $.ajax({
    url: './updateTrees.php',
    data: { 
      's': status,
      'id': document.getElementById("chosenTreeId").value
    },
    type: 'post',
    success: function (output) {
      alert(output);
    },
    error: function (request, status, error) {
      alert("Error: Could not delete -> "+ error+ " ---- status -> "+ status);
    }
  });
}