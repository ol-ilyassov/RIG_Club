
//Function that returns the value of registerPageState.
function updateRegPage() {
  $.post("php/regPageState.php", { action: "onUpdate" },
    function(data) {
      if (data == "0") {
        $('#regState').text("Open");
        $('#regState').css("color", "green");
        $('#regPage').css("display", "block");
      } else if (data == "1") {
        $('#regState').text("Close");
        $('#regState').css("color", "red");
        $('#regPage').css("display", "none");
      } else {
        $('#regState').text("Error");
        $('#regState').css("color", "purple");
        $('#regPage').css("display", "none");
      }
  });
}

//Checks the value of registerPageState in the beginning and every 5 sec interval.
$(document).ready(function(){
  updateRegPage();
  setInterval(function() { updateRegPage(); } , 5000);
});

//Function that changes the value of registerPageState (Function for "Change" button).
$(document).ready(function(){
	$('#regChangeState').click(function(){
    $.post("php/regPageState.php", { action: "changeState" },
      function(data) {
        updateRegPage();
    });
  });
});
