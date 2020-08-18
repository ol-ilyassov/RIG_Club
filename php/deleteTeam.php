<?php
  //Deletes all information from all tables about specific team by id.
  require '../includes/dbconnect.php';

  $sql = "DELETE FROM teams WHERE team_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
 	if ($stmt === false) {
 		echo mysqli_error($conn);
 	} else {
 		mysqli_stmt_bind_param($stmt,"i",$_GET['id']);
 		if (mysqli_stmt_execute($stmt)) {
 			echo "DELETED SUCCESSFULLY";
 		} else {
 			echo mysqli_stmt_error($stmt);
 		}
 	}

  $sql = "DELETE FROM linefollower WHERE team_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt === false) {
    echo mysqli_error($conn);
  } else {
    mysqli_stmt_bind_param($stmt,"i",$_GET['id']);
    if (mysqli_stmt_execute($stmt)) {
      echo "DELETED SUCCESSFULLY";
    } else {
      echo mysqli_stmt_error($stmt);
    }
  }

  $sql = "DELETE FROM kegelring WHERE team_id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt === false) {
    echo mysqli_error($conn);
  } else {
    mysqli_stmt_bind_param($stmt,"i",$_GET['id']);
    if (mysqli_stmt_execute($stmt)) {
      echo "DELETED SUCCESSFULLY";
    } else {
      echo mysqli_stmt_error($stmt);
    }
  }

  header("Location: ../teamsControlPage.php");
?>
