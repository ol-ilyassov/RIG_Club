<?php
  //Page is used to logout from session.
  session_start();
  if(isset($_SESSION['admin_id'])) {
	  setcookie(session_name(), '', 100);
	  unset($_SESSION['admin_id']);
	  session_unset();
	  session_destroy();
	  $_SESSION = array();
  }
  header("Location: ../index.php");
?>
