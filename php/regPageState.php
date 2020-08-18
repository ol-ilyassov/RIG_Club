<?php
  require '../includes/dbconnect.php';

  //Returns the value of registerControlPage.
  if (isset($_POST['action'])  && $_POST['action'] == "onUpdate") {
    $query = sprintf("SELECT state FROM registercontrolpage WHERE id = 1");
    $result = mysqli_query($conn, $query);
    $idtemp = mysqli_fetch_assoc($result);
    echo $idtemp['state'];
  }

  //Changes the value of registerControlPage.
  if (isset($_POST['action']) && $_POST['action'] == "changeState") {
    $query = sprintf("SELECT state FROM registercontrolpage WHERE id = 1");
    $result = mysqli_query($conn, $query);
    $idtemp = mysqli_fetch_assoc($result);
    if ($idtemp['state'] == 0) {
      $query = sprintf("UPDATE registercontrolpage SET state = 1 WHERE id = 1");
      $result = mysqli_query($conn, $query);
      echo "1";
    } else {
      $query = sprintf("UPDATE registercontrolpage SET state = 0 WHERE id = 1");
      $result = mysqli_query($conn, $query);
      echo "0";
    }
  }
?>
