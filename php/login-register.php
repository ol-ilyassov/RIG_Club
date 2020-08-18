<?php
  session_start();
  require '../includes/dbconnect.php';

  //Function is used to make validdation of input data.
  function validateData($data) {
      $resultData = htmlspecialchars(stripslashes(trim($data)));
      return $resultData;
  }

  //Inserts data in teams table and table by category name.
  if (isset($_POST['action']) && $_POST['action'] == 'registration') {
    $teamName = validateData($_POST['teamName']);
    $participant1Name = validateData($_POST['participant1Name']);
    $participant1Surname = validateData($_POST['participant1Surname']);
    $participant2Name = validateData($_POST['participant2Name']);
    $participant2Surname = validateData($_POST['participant2Surname']);
    $trainerName = validateData($_POST['trainerName']);
    $trainerSurname = validateData($_POST['trainerSurname']);
    $club = validateData($_POST['club']);
    $locality = validateData($_POST['locality']);
    $email = validateData($_POST['email']);
    $telephone = validateData($_POST['telephone']);
    $category = validateData($_POST['category']);

    $stmt = $conn->prepare("INSERT INTO teams(teamName,
      participant1Name, participant1Surname, participant2Name,
      participant2Surname, trainerName, trainerSurname, club,
      locality, email, telephone, category)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $teamName,
      $participant1Name, $participant1Surname, $participant2Name,
      $participant2Surname, $trainerName, $trainerSurname,
      $club, $locality, $email, $telephone, $category);

    $stmt->execute();
    $idtemp = $stmt->insert_id;
    $stmt->close();

    if ($category == "Line Follower") {
      $stmt1 = $conn->prepare("INSERT INTO linefollower(team_id)
        VALUES (?)");
      $stmt1->bind_param("i", $idtemp);
    } else if ($category == "Kegelring") {
      $stmt1 = $conn->prepare("INSERT INTO kegelring(team_id)
        VALUES (?)");
      $stmt1->bind_param("i", $idtemp);
    }

    if ($stmt1->execute()) {
      echo "success";
    } else {
      echo mysqli_error($conn);
    }
    
    $stmt1->close();
    $conn->close();
  }

  //Makes validation and authorisation of admin.
  if (isset($_POST['action']) && $_POST['action'] == 'authorization') {
    $login = validateData($_POST['login']);
    $password = validateData($_POST['password']);
    $password = md5($password);
    $errMsg = "";
    $sql = "SELECT admin_id, name FROM admins WHERE login=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password);
    if ($stmt->execute()) {
      $result = $stmt->get_result();
      $record = mysqli_fetch_array($result);
      $_SESSION['admin_id'] = $record['admin_id'];
      $_SESSION['admin_name'] = $record['name'];
    } else {
      $errMsg = mysqli_error($conn);
    }
    $stmt->close();
    $conn->close();
    if ($errMsg != "") {
      echo $errMsg;
    } else {
      echo "success";
    }
  }
?>
