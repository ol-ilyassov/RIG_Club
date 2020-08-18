<!-- IMPORTANT: -->
<!-- THE WEBSITE MUST BE CONNECTED TO DATABASE -->
<!-- AND HAVE ACCESS TO THE TABLE registerControlPage, -->
<!-- with id = 1 and state = 0 -->
<!-- IN ORDER TO DISPLAY REGISTRATION PAGE. -->

<!-- Header -->

<?php
  session_start();
  $title = "«RIG» - Registration";
  require 'includes/header.php';
?>

<!-- Content -->

<script src="js/login-register.js"></script>
<script>
  //If registerControlPage value is 1 (Closed), then redirect to Home Page.
  $.post("php/regPageState.php", { action: "onUpdate" },
    function(data) {
      if (data == "1") {
        window.location.href = "index.php";
      }
    }
  );
</script>
<div class="wrapper">
  <div id="left-right">
    <article class="block0">
      <h2> Team Registration Form: </h2>
      <center>
			<span id="successMsg" class="success"></span>
			<span id="failMsg" class="error"></span>
      <form role="form" method="post" name="reg-form">
        <fieldset>
          <div class="form-register">
            <div>
               <label for="reg-category">Category:</label><br>
               <select id="reg-category" name="reg-category">
                  <option value="0"></option>
                  <option value="Line Follower">Line Follower</option>
                  <option value="Kegelring">Kegelring</option>
               </select><br>
							 <span id="reg-category-error" class="error"></span>
            </div>
						<div>
							<label for="reg-teamName">Team Name [<span id="teamNameState">Status</span>]:</label><br>
              <input type="text" id="reg-teamName" name="reg-teamName" placeholder="Enter Team Name"><br>
							<span id="reg-teamName-error" class="error"></span>
            </div>
            <div>
							<label for="reg-participant1Name">Participant #1 Name:</label><br>
              <input type="text" id="reg-participant1Name" name="reg-participant1Name" placeholder="Enter Name"><br>
							<span id="reg-participant1Name-error" class="error"></span>
            </div>
            <div>
							<label for="reg-participant1Surname">Participant #1 Surname:</label><br>
              <input type="text" id="reg-participant1Surname" name="reg-participant1Surname" placeholder="Enter Surname"><br>
							<span id="reg-participant1Surname-error" class="error"></span>
            </div>
            <div>
							<label for="reg-participant2Name">Participant #2 Name:</label><br>
              <input type="text" id="reg-participant2Name" name="reg-participant2Name" placeholder="Enter Name"><br>
							<span id="reg-participant2Name-error" class="error"></span>
            </div>
            <div>
							<label for="reg-participant2Surname">Participant #2 Surname:</label><br>
              <input type="text" id="reg-participant2Surname" name="reg-participant2Surname" placeholder="Enter Surname"><br>
							<span id="reg-participant2Surname-error" class="error"></span>
            </div>
						<div>
							<label for="reg-trainerName">Trainer Name:</label><br>
              <input type="text" id="reg-trainerName" name="reg-trainerName" placeholder="Enter Name"><br>
							<span id="reg-trainerName-error" class="error"></span>
            </div>
						<div>
							<label for="reg-trainerSurname">Trainer Surname:</label><br>
              <input type="text" id="reg-trainerSurname" name="reg-trainerSurname" placeholder="Enter Surname"><br>
							<span id="reg-trainerSurname-error" class="error"></span>
            </div>
						<div>
							<label for="reg-club">Club:</label><br>
              <input type="text" id="reg-club" name="reg-club" placeholder="Enter Club"><br>
							<span id="reg-club-error" class="error"></span>
            </div>
						<div>
							<label for="reg-locality">Club Locality (City/Village name):</label><br>
              <input type="text" id="reg-locality" name="reg-locality" placeholder="Enter Locality"><br>
							<span id="reg-locality-error" class="error"></span>
            </div>
            <div>
							<label for="reg-email">Email:<span id="emailState"></span></label><br>
              <input type="text" id="reg-email" name="reg-email" placeholder="Enter Email"><br>
							<span id="reg-email-error" class="error"></span>
            </div>
            <div>
							<label for="reg-telephone">Сell Phone Number:</label><br>
              <input type="text" id="reg-telephone" name="reg-telephone" placeholder="Enter Number"><br>
							<span id="reg-telephone-error" class="error"></span>
            </div>
            <div class="buttons">
              <input type="button" id="reg-button" name="reg-button" value="Register">
							<input type="button" id="reg-clear" name="reg-clear" value="Clear">
            </div>
          </div>
        </fieldset>
      </form>
      </center>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
