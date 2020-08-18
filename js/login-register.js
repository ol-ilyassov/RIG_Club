
/* --- Functions to validate input data --- */

function validateEmail(input) {
	var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (emailFormat.test(input)) {
		return true;
	} else {
		return false;
	}
}

function pregMatchCommon(input) {
	var emailFormat = /^[a-zA-Z0-9!@#$%^&*()_+-<>?]*$/;
	if (emailFormat.test(input)) {
		return true;
	} else {
		return false;
	}
}

function pregMatchAlphabets(input) {
	var regExp = /^[a-zA-Z]*$/;
	if (regExp.test(input)) {
		return true;
	} else {
		return false
	}
}

function pregMatchNumbers(input) {
	var regExp = /^[0-9]*$/;
	if (regExp.test(input)) {
		return true;
	} else {
		return false
	}
}

/* --- [Registration] --- */

//Function checks if the entered name is free or reserved.
$(document).ready(function(){
	$('#reg-teamName').keyup(function(){
		var flagTeamName = false;
		var teamName = $('#reg-teamName').val();
		if (teamName == "") {
			$('#teamNameState').text("Status");
			$('#teamNameState').css("color","black");
		} else {
		  $.post("php/checkReserveTeamName.php", function(data) {
		    data = JSON.parse(data);
		    for (var key in data) {
	  		  if (data[key].teamName.toLowerCase() == teamName.toLowerCase()) {
	  			  flagTeamName = true;
	  		  }
	    	}
	    	if (flagTeamName == true) {
		  		$('#teamNameState').text("Reserved");
	    		$('#teamNameState').css("color","red");
	    	} else {
		  		$('#teamNameState').text("Free");
	    		$('#teamNameState').css("color","green");
	    	}
	    });
	  }
  });
});

//Checks the correctness of input data in real time.
$(document).ready(function(){
  $('#reg-category').bind("change", function(){
    $('#reg-category-error').text("");
    $('#failMsg').text("");
  });
  $('#reg-teamName').keyup(function(){
    $('#reg-teamName-error').text("");
    $('#failMsg').text("");
    if (!pregMatchCommon($('#reg-teamName').val())) {
      $('#reg-teamName-error').text("Invalid Team Name format");
  	}
  });
  $('#reg-participant1Name').keyup(function(){
    $('#reg-participant1Name-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-participant1Name').val())) {
      $('#reg-participant1Name-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-participant1Surname').keyup(function(){
    $('#reg-participant1Surname-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-participant1Surname').val())) {
      $('#reg-participant1Surname-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-participant2Name').keyup(function(){
    $('#reg-participant2Name-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-participant2Name').val())) {
      $('#reg-participant2Name-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-participant2Surname').keyup(function(){
    $('#reg-participant2Surname-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-participant2Surname').val())) {
      $('#reg-participant2Surname-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-trainerName').keyup(function(){
    $('#reg-trainerName-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-trainerName').val())) {
      $('#reg-trainerName-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-trainerSurname').keyup(function(){
    $('#reg-trainerSurname-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-trainerSurname').val())) {
      $('#reg-trainerSurname-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-trainerSurname').keyup(function(){
    $('#reg-trainerSurname-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-trainerSurname').val())) {
      $('#reg-trainerSurname-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-club').keyup(function(){
    $('#reg-club-error').text("");
    $('#failMsg').text("");
    if (!pregMatchCommon($('#reg-club').val())) {
      $('#reg-club-error').text("Invalid Club Name format");
  	}
  });
  $('#reg-locality').keyup(function(){
    $('#reg-locality-error').text("");
    $('#failMsg').text("");
    if (!pregMatchAlphabets($('#reg-locality').val())) {
      $('#reg-locality-error').text("Alphabets only are allowed");
  	}
  });
  $('#reg-email').keyup(function(){
    $('#reg-email-error').text("");
    $('#failMsg').text("");
  });
  $('#reg-telephone').keyup(function(){
    $('#reg-telephone-error').text("");
    $('#failMsg').text("");
    if (isNaN($('#reg-telephone').val())
       || (!pregMatchNumbers($('#reg-telephone').val()))
       || ($('#reg-telephone').val().length > 11)
       || ($('#reg-telephone').val().charAt(0) != '8')) {
  		$('#reg-telephone-error').text("Invalid telephone format");
  	}
  });
});

//Validation of input data before inserting to database.
$(document).ready(function(){
	$('#reg-button').click(function(){
    $('#failMsg').text("");
		$('#successMsg').text("");
    $('#reg-category-error').text("");
		$('#reg-teamName-error').text("");
    $('#reg-participant1Name-error').text("");
    $('#reg-participant1Surname-error').text("");
    $('#reg-participant2Name-error').text("");
    $('#reg-participant2Surname-error').text("");
    $('#reg-trainerName-error').text("");
    $('#reg-trainerSurname-error').text("");
    $('#reg-club-error').text("");
    $('#reg-locality-error').text("");
    $('#reg-email-error').text("");
    $('#reg-telephone-error').text("");

    var category = $('#reg-category').val();
    var teamName = $('#reg-teamName').val();
    var participant1Name = $('#reg-participant1Name').val();
    var participant1Surname = $('#reg-participant1Surname').val();
    var participant2Name = $('#reg-participant2Name').val();
    var participant2Surname = $('#reg-participant2Surname').val();
    var trainerName = $('#reg-trainerName').val();
    var trainerSurname = $('#reg-trainerSurname').val();
    var club = $('#reg-club').val();
    var locality = $('#reg-locality').val();
    var email = $('#reg-email').val();
    var telephone = $('#reg-telephone').val();

    var error = false;

    if (category == "0") {
      $('#reg-category-error').text("Category is required");
      error = true;
    }
    if (teamName == "") {
      $('#reg-teamName-error').text("Team Name is required");
      error = true;
    } else if (!pregMatchCommon(teamName)) {
      $('#reg-teamName-error').text("Invalid Team Name format");
      error = true;
  	} else if ($('#teamNameState').text() == "Reserved") {
			$('#reg-teamName-error').text("Team Name is Reserved");
			error = true;
		}
    if (participant1Name == "") {
      $('#reg-participant1Name-error').text("Participant#1 Name is required");
      error = true;
  	} else if (!pregMatchAlphabets(participant1Name)) {
      $('#reg-participant1Name-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (participant1Surname == "") {
      $('#reg-participant1Surname-error').text("Participant#1 Surname is required");
      error = true;
  	} else if (!pregMatchAlphabets(participant1Surname)) {
      $('#reg-participant1Surname-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (participant2Name == "") {
      $('#reg-participant2Name-error').text("Participant#2 Name is required");
      error = true;
  	} else if (!pregMatchAlphabets(participant2Name)) {
      $('#reg-participant2Name-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (participant2Surname == "") {
      $('#reg-participant2Surname-error').text("Participant#2 Surname is required");
      error = true;
  	} else if (!pregMatchAlphabets(participant2Surname)) {
      $('#reg-participant2Surname-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (trainerName == "") {
      $('#reg-trainerName-error').text("Trainer Name is required");
      error = true;
  	} else if (!pregMatchAlphabets(trainerName)) {
      $('#reg-trainerName-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (trainerSurname == "") {
      $('#reg-trainerSurname-error').text("Trainer Surname is required");
      error = true;
  	} else if (!pregMatchAlphabets(trainerSurname)) {
      $('#reg-trainerSurname-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (club == "") {
      $('#reg-club-error').text("Club is required");
      error = true;
  	} else if (!pregMatchCommon(club)) {
      $('#reg-club-error').text("Invalid Club Name format");
      error = true;
  	}
    if (locality == "") {
      $('#reg-locality-error').text("Locality is required");
      error = true;
  	} else if (!pregMatchAlphabets(locality)) {
      $('#reg-locality-error').text("Alphabets only are allowed");
      error = true;
  	}
    if (email == "") {
      $('#reg-email-error').text("Email is required");
      error = true;
  	} else if (!validateEmail(email)) {
      $('#reg-email-error').text("Invalid email format");
      error = true;
  	}
    if (telephone == "") {
      $('#reg-telephone-error').text("Telephone is required");
      error = true;
  	} else if (isNaN(telephone)
              || (!pregMatchNumbers(telephone))
              || (telephone.length != 11)
              || (telephone.charAt(0) != '8')) {
  		$('#reg-telephone-error').text("Invalid telephone format");
      error = true;
  	}

    if (error == true) {
      $('#failMsg').text("Error, re-Check input data!");
    } else {
			$.post("php/login-register.php", { category: category,
				                                 teamName: teamName,
																				 participant1Name: participant1Name,
				                                 participant1Surname: participant1Surname,
																				 participant2Name: participant2Name,
																				 participant2Surname: participant2Surname,
																				 trainerName: trainerName,
																			   trainerSurname: trainerSurname,
																				 club: club,
																			   locality: locality,
																			 	 email: email,
																			 	 telephone: telephone,
																				 action: "registration"
			}, function(data) {
		    if (data == "success") {
					$('#successMsg').text("Successful Registration!");
					$('#failMsg').text("");
					clearRegFields();
				} else {
					$('#successMsg').text("");
					$('#failMsg').text(data);
				}
	    });
		}
  });
});

//Clears all fields and messages (function for "Clear" button).
$(document).ready(function(){
	$('#reg-clear').click(function(){
    $('#failMsg').text("");
		$('#successMsg').text("");
		clearRegFields();
	});
});

//Clears all fields.
function clearRegFields() {
	$('#teamNameState').text("Status");
	$('#teamNameState').css("color","black");

	$('#reg-category').val("0");
	$('#reg-teamName').val("");
	$('#reg-participant1Name').val("");
	$('#reg-participant1Surname').val("");
	$('#reg-participant2Name').val("");
	$('#reg-participant2Surname').val("");
	$('#reg-trainerName').val("");
	$('#reg-trainerSurname').val("");
	$('#reg-club').val("");
	$('#reg-locality').val("");
	$('#reg-email').val("");
	$('#reg-telephone').val("");

	$('#reg-category-error').text("");
	$('#reg-teamName-error').text("");
	$('#reg-participant1Name-error').text("");
	$('#reg-participant1Surname-error').text("");
	$('#reg-participant2Name-error').text("");
	$('#reg-participant2Surname-error').text("");
	$('#reg-trainerName-error').text("");
	$('#reg-trainerSurname-error').text("");
	$('#reg-club-error').text("");
	$('#reg-locality-error').text("");
	$('#reg-email-error').text("");
	$('#reg-telephone-error').text("");
}


/* --- [Authorization] --- */

//Validation of input data before making authorisation.
$(document).ready(function(){
  $('#log-login').keyup(function(){
  	$('#log-login-error').text("");
  	$('#failMsg').text("");
  	if (!pregMatchCommon($('#log-login').val())) {
	  	$('#log-login-error').text("Invalid login format");
  	}
  });
  $('#log-password').keyup(function(){
  	$('#log-password-error').text("");
  	$('#failMsg').text("");
  	if (!pregMatchCommon($('#log-password').val())) {
	  	$('#log-password-error').text("Invalid password format");
	  }
  });
});

$(document).ready(function(){
	$('#log-button').click(function(){
		$('#failMsg').text("");
		$('#successMsg').text("");
    $('#log-login-error').text("");
    $('#log-password-error').text("");

    var login = $('#log-login').val();
    var password = $('#log-password').val();

		var error = false;

		if (login == "") {
      $('#log-login-error').text("Login is required");
      error = true;
  	} else if (!pregMatchCommon(login)) {
      $('#log-login-error').text("Invalid login format");
      error = true;
  	}
		if (password == "") {
      $('#log-password-error').text("Password is required");
      error = true;
  	} else if (!pregMatchCommon(password)) {
      $('#log-password-error').text("Invalid password format");
      error = true;
  	}

		if (error == true) {
      $('#failMsg').text("Error, re-Check input data!");
    } else {
			$.post("php/login-register.php", { login: login,
				                                 password: password,
																				 action: "authorization"
			}, function(data) {
		    if (data == "success") {
					$('#failMsg').text("");
					clearLogFields();
					window.location.href = "index.php";
				} else {
					$('#failMsg').text(data);
				}
	    });
		}
  });
});

//Clears all fields and messages (function for "Clear" button).
$(document).ready(function(){
	$('#log-clear').click(function(){
    $('#failMsg').text("");
		clearLogFields();
	});
});

//Clears all fields.
function clearLogFields() {
	$('#log-login').val("");
	$('#log-password').val("");

	$('#log-login-error').text("");
	$('#log-password-error').text("");
}
