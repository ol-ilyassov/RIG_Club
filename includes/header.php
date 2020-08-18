<html>
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.5.1.js"
          integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
          crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style(media).css">
  <link rel="stylesheet" href="css/left-nav-style.css">
  <link rel="stylesheet" href="css/slider.css">
  <link rel="shortcut icon" href="img/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?=$title?></title>
</head>
<body>

<!-- Navigation Menu -->

  <script src="js/regPageState.js"></script>
  <input type="checkbox" id="nav-toggle" hidden>
  <nav class="nav">
    <label for="nav-toggle" class="nav-toggle" onclick></label>
    <h2>Menu</h2>
    <ul>
      <li><a href="index.php">Home Page</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="rules.php">Category Rules</a></li>
      <?php
        if(isset($_SESSION['admin_id'])) {
      ?>
      <li><a href="tableScoresAdmin.php">Scores Table</a></li>
      <?php
        } else {
      ?>
      <li><a href="tableScores.php">Scores Table</a></li>
      <?php
        }
      ?>
      <li><a href="results.php">Results</a></li>
      <li><a id="regPage" href="register.php">Team Registration</a></li>
      <?php
        if(isset($_SESSION['admin_id'])) {
      ?>
      <li><a href="accountAdmin.php">Account: <?=$_SESSION['admin_name'];?></a></li>
      <li><a href="php/logout.php">Log out</a></li>
      <?php
        } else {
      ?>
      <li><a href="login.php">Authorization</a></li>
      <?php
        }
      ?>
    </ul>
  </nav>

<!-- Header -->

  <header>
    <a href="index.php"><img src="img/icon.png" alt="logo"></a>
  </header>
