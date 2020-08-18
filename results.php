
<!-- Header -->

<?php
  session_start();
  $title= "«RIG» - Results";
  require 'includes/header.php';
?>

<!-- Content -->

<script src="js/results.js"></script>
<div class="wrapper">
	<div id="left-right">
	  <article class="block0">
		  <h2> Statistics [Line Follower]:</h2><br>
      <p> - Average Score for Competition: <span id="aveScoreLF"></span></p>
      <p> - Average Time for Competition: <span id="aveTimeLF"></span></p>
      <p> - Successful Completion of Map: <span id="successCompleteLF"></span></p>

      <h2> Results [Line Follower]:</h2><br>
      <p style="margin-left: 75px;">Place <b>1st:</b> <span id="place1LF"></span></p>
      <p style="margin-left: 50px;">Place <b>2nd:</b> <span id="place2LF"></span></p>
      <p style="margin-left: 25px;">Place <b>3rd:</b> <span id="place3LF"></span></p>
      <br>
    </article>
    <hr>
    <article class="block1">
      <h2> Statistics [Kegelring]:</h2><br>
      <p> - Average Score for Competition: <span id="aveScoreK"></span></p>
      <p> - Average Time for Competition: <span id="aveTimeK"></span></p>
      <p> - Successful Completion of Map: <span id="successCompleteK"></span></p>

      <h2> Results [Kegelring]:</h2><br>
      <p style="margin-left: 75px;">Place <b>1st:</b> <span id="place1K"></span></p>
      <p style="margin-left: 50px;">Place <b>2nd:</b> <span id="place2K"></span></p>
      <p style="margin-left: 25px;">Place <b>3rd:</b> <span id="place3K"></span></p>
      <br>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
