
<!-- Header -->

<?php
  session_start();
  //If there is no session, then redirect to Home Page.
  if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
  }
  require 'includes/dbconnect.php';
  require "php/commandsTeam.php";
  $row = getTeamInfoById($conn, $_GET['id']);

  $title = "«RIG» - ".$row['teamName']." Info";
  require 'includes/header.php';
?>

<!-- Content -->

<div class="wrapper">
  <div id="left-right">
    <article class="block0">
      <h2>Team Info: "<?=$row['teamName']?>" </h2>
      <br><br>
      <div id="ti">
        <div id="tiLeft"><p>Participant Name #1: </p></div><div id="tiRight"><?=$row['participant1Name']?></div>
        <div id="tiLeft"><p>Participant Surname #1: </p></div><div id="tiRight"><?=$row['participant1Surname']?></div>
        <div id="tiLeft"><p>Participant Name #2: </p></div><div id="tiRight"><?=$row['participant2Name']?></div>
        <div id="tiLeft"><p>Participant Surname #2: </p></div><div id="tiRight"><?=$row['participant2Surname']?></div>
        <div id="tiLeft"><p>Trainer Name: </p></div><div id="tiRight"><?=$row['trainerName']?></div>
        <div id="tiLeft"><p>Trainer Surname: </p></div><div id="tiRight"><?=$row['trainerSurname']?></div>
        <div id="tiLeft"><p>Club: </p></div><div id="tiRight"><?=$row['club']?></div>
        <div id="tiLeft"><p>Club Locality: </p></div><div id="tiRight"><?=$row['locality']?></div>
        <div id="tiLeft"><p>Email: </p></div><div id="tiRight"><?=$row['email']?></div>
        <div id="tiLeft"><p>Telephone: </p></div><div id="tiRight"><?=$row['telephone']?></div>
        <div id="tiLeft"><p>Category: </p></div><div id="tiRight"><?=$row['category']?></div>
      </div>
      <center><a class="aButton" href="teamsControlPage.php"><div class="alinkButton">BACK</div></a></center>
      <br>
		</article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
