
<!-- Header -->

<?php
  session_start();
  //If there is session, then redirect to page table with Scores with version for Admins.
  if(isset($_SESSION['admin_id'])) {
    header("Location: tableScoresAdmin.php");
  }
  require 'includes/dbconnect.php';
  require "php/commandsCategory.php";
  require "php/commandsTeam.php";

  $title= "«RIG» - Scores Table";
  require 'includes/header.php';
?>

<!-- Content -->

<div class="wrapper">
  <div id="left-right">
    <article class="block0">
      <h2>Scores Table | Line Follower: </h2>
      <br><br>
      <?php
        $tablename = 'linefollower';
        $records = records_all($conn, $tablename);
        if (empty($records)) {
          echo "<center><p> - NO TEAMS - </p></center>";
        } else {
      ?>
      <div id="ts">
        <div id="tsLeftHead">Team</div>
        <div id="tsRighterHead"><p>Task #1</p><p>(max.10)</p></div>
        <div id="tsRighterHead"><p>Task #2</p><p>(max.10)</p></div>
        <div id="tsRighterHead"><p>Task #3</p><p>(max.10)</p></div>
        <div id="tsRighterHead"><p>Overall</p><p>(max.30)</p></div>
        <div id="tsRighterHead"><p>Time</p><p>(max. 02:00)</p></div>
        <?php foreach($records as $a): ?>
        <div id="tsLeftBlock"><?=getTeamName($conn, $a['team_id'])?></div>
        <div id="tsRighterBlock"><?=$a['task1']?></div>
        <div id="tsRighterBlock"><?=$a['task2']?></div>
        <div id="tsRighterBlock"><?=$a['task3']?></div>
        <div id="tsRighterBlock"><?=$a['sum_scores']?></div>
        <div id="tsRighterBlock"><?=getProperTime($a['timem'], $a['times'])?></div>
        <?php endforeach ?>
      </div>
      <?php } ?>
      <br>
    </article>
    <hr>
    <article class="block1">
      <h2>Scores Table | Kegelring: </h2>
      <br><br>
      <?php
        $tablename = 'kegelring';
        $records = records_all($conn, $tablename);
        if (empty($records)) {
          echo "<center><p> - NO TEAMS - </p></center>";
        } else {
      ?>
      <div id="ts">
        <div id="tsLeftHead">Team</div>
        <div id="tsRighterHead"><p>Task #1</p><p>(max.10)</p></div>
        <div id="tsRighterHead"><p>Task #2</p><p>(max.10)</p></div>
        <div id="tsRighterHead"><p>Task #3</p><p>(max.10)</p></div>
        <div id="tsRighterHead"><p>Overall</p><p>(max.30)</p></div>
        <div id="tsRighterHead"><p>Time</p><p>(max. 02:00)</p></div>
        <?php foreach($records as $a): ?>
        <div id="tsLeftBlock"><?=getTeamName($conn, $a['team_id'])?></div>
        <div id="tsRighterBlock"><?=$a['task1']?></div>
        <div id="tsRighterBlock"><?=$a['task2']?></div>
        <div id="tsRighterBlock"><?=$a['task3']?></div>
        <div id="tsRighterBlock"><?=$a['sum_scores']?></div>
        <div id="tsRighterBlock"><?=getProperTime($a['timem'], $a['times'])?></div>
        <?php endforeach ?>
      </div>
      <?php } ?>
      <br>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
