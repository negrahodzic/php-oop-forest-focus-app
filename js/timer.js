function startTimer(min) {$("#remove").hide();
  $("#remove").hide();
  var minutes = min;
  var now = new Date();
  var countDownDate = new Date(now);
  countDownDate.setMinutes(now.getMinutes() + minutes);
  // Update the count down every 1 second
  var x = setInterval(function () {
    $("#remove").hide();
    $("#start").hide();
    $("#give_up").show();
    // Notify user that tree is growing
    // document.getElementById('remove').style.visibility = 'hidden';
    document.getElementById("status").value = "Tree is growing!";
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="timer"
    document.getElementById("timer").innerHTML = hours + "h "
      + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("timer").innerHTML = "Successfully planted your tree!";
      document.getElementById("status").value = "Planted";
      updateStatus("Planted");
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