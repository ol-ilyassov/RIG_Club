
<!-- Header -->

<?php
  session_start();
  //If there is session, then redirect to Home Page.
  if(isset($_SESSION['admin_id'])) {
    header("Location: index.php");
  }
  $title = "«RIG» - Authorization";
  require 'includes/header.php';
?>

<!-- Content -->

<script src="js/login-register.js"></script>
<div class="wrapper">
  <div id="left-right">
    <article class="block0">
      <h2> Authorization Form: </h2>
      <center>
			<span id="failMsg" class="error"></span>
      <form role="form" method="post" name="log-form">
        <fieldset>
          <div class="form-login">
            <div>
							<label for="reg-participant1Name">Login:</label><br>
              <input type="text" id="log-login" name="log-login" placeholder="Enter Login"><br>
							<span id="log-login-error" class="error"></span>
            </div>
            <div>
							<label for="log-password">Password:</label><br>
              <input type="password" id="log-password" name="log-password" placeholder="Enter Password"><br>
							<span id="log-password-error" class="error"></span>
            </div>
            <div class="buttons">
              <input type="button" id="log-button" name="log-button" value="Login">
				  		<input type="button" id="log-clear" name="log-clear" value="Clear">
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
