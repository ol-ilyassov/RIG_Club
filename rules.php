
<!-- Header -->

<?php
  session_start();
  $title= "«RIG» - Category Rules";
  require 'includes/header.php';
?>

<!-- Content -->

<script src="js/categoryRules.js"></script>
<div class="wrapper">
  <div id="left-right">
	  <article class="block0">
	    <h2>Rules - General: </h2>
	    <p>
				<b>Number of robots from the team:</b> 1<br><br>
        <b>Maximum time for attempt:</b> 02:00 minutes<br><br>
        <b>Robot Dimensions:</b> 25cm x 25cm x 25cm<br><br>
        <b>Robot control:</b> Standalone (programming)<br><br>
        <b>Valid assembly parts:</b> LEGO EV3 MINDSTORMS or LEGO NXT MINDSTORMS<br><br>
		  </p>
      <ul>
        <li><b>Robot dimensions:</b> Each robot must pass a quarantine check. Dimensions of robots must comply with the specified parameters, otherwise the team skips the attempt.</li>
        <li><b>Time limit:</b> The robot must score the maximum number of points in 2 minutes. After 02:00 minutes, the robot must be stopped and the team receives points that were earned in the allotted time.</li>
        <li><b>Autonomous control:</b> The robot must be completely autonomous and move according to a program that has been downloaded to quarantine. If this violation is detected, the team will be disqualified.</li>
        <li><b>Quarantine:</b> After the time for assembly and calibration, the robot must be submitted for verification by size and disabled before the start of the attempt (round).</li>
        <li><b>Plagiarism:</b> Teams are not allowed to copy the assembly of other teams. If this violation is revealed, then an investigation will be carried out and the violating team will be disqualified.</li>
        <li>During the passage of the card, participants are prohibited from touching the robots and the table. A team may be able to pick up a robot only with the permission of the judge.</li>
      </ul>
			<br>
			<h2>Rules - Line Follower: </h2>
			<p><b>The basic principle of passing the map:</b> The robot must follow the line (the color may vary) and choose special ways for scoring and go through the map in the least time.<br></p>
      <br>
			<h2>Rules - Kegelring: </h2>
			<p><b>The basic principle of passing the map:</b> The robot must shoot down banks and complete additional tasks that will be announced on the day of competition.<br></p>
      <br>
	  </article>
	  <hr>
	  <article class="block1">
	    <h2>How robot should move by line: </h2>
	   	<div id="video" style="text-align:center">
 	      <video id="Video1" width="70%">
	        <source src="media/howToMove.mp4" type="video/mp4">
    	  </video>
    	  <div id="buttonbar">
    	    <button id="play" onclick="vidplay()">&gt;</button>
    	    <button id="restart" onclick="restart();">[]</button>
    	    <button id="rew" onclick="skip(-10)">&lt;&lt;</button>
    	    <button id="fastFwd" onclick="skip(10)">&gt;&gt;</button>
    	  </div>
    	</div>
	  </article>
	  <hr>
    <article class="block2">
      <div><h2>Map [Line Follower]: </h2></div>
      <p>You can choose areas on the map to get information about scores</p>
      <center><img style="height: auto;width: 480px;" src="img/linefollowermap.jpg" alt="map" usemap="#workmap"></center>
      <map name="workmap">
        <area style="cursor: pointer" shape="rect" coords="5, 5, 50, 50" onclick="openMap7()">
        <area style="cursor: pointer" shape="rect" coords="140, 140, 190, 190" onclick="openMap1()">
        <area style="cursor: pointer" shape="rect" coords="90, 20, 230, 135" onclick="openMap2()">
        <area style="cursor: pointer" shape="rect" coords="290, 55, 330, 95" onclick="openMap3()">
        <area style="cursor: pointer" shape="rect" coords="365, 55, 400, 95" onclick="openMap4()">
        <area style="cursor: pointer" shape="rect" coords="335, 110, 465, 180" onclick="openMap5()">
        <area style="cursor: pointer" shape="rect" coords="425, 45, 475, 100" onclick="openMap6()">
      </map>
      <p id="score"></p>
      <p>Magnification: </p>
      <center><img id="imgscore" style="width: 300px;height: 300px"></center>
      <div><h2>Map [Kegelring]: </h2></div>
      <p>Map for Kegelring category will be presented to the participants on the day of Competition .</p>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
