<?php
  require '../includes/dbconnect.php';
  require 'commandsCategory.php';
  require 'commandsTeam.php';

  //Returns info about Winners (encoded in JSON).
  if (isset($_GET['action']) && $_GET['action'] == 'getWinners') {
    $tablename = $_GET['tablename'];
    $query = "SELECT * FROM $tablename ORDER BY sum_scores DESC, timem ASC, times ASC LIMIT 3";
    $result = mysqli_query($conn, $query);
    if (!$result)
      die(mysqli_error($conn));
    $n = mysqli_num_rows($result);
    $records = array();
    for ($i= 0; $i < $n; $i++){
      $row = mysqli_fetch_assoc($result);
      $tempRecords[] = $row;
    }
    foreach ($tempRecords as $temp) {
      $record['teamName'] = getTeamName($conn, $temp['team_id']);
      $record['sumScores'] = $temp['sum_scores'];
      $record['time'] = getProperTime($temp['timem'], $temp['times']);
      $records[] = $record;
    }
    echo json_encode($records);
  }

  //Returns info about Statistical data of specific Category (encoded in JSON).
  if (isset($_GET['action']) && $_GET['action'] == 'getStats') {
    $tablename = $_GET['tablename'];
    $records = records_all($conn, $tablename);
    $participantsNumber = 0;
    $averageScore = 0;
    $averageTimeM = 0;
    $averageTimeS = 0;
    $successTask = 0;

    foreach ($records as $a):
      if ($a['team_id'] != "")
        $participantsNumber++;
      if ($a['sum_scores'] == 30)
        $successTask++;
      $averageScore = ($a['sum_scores'] + $averageScore);
      $averageTimeM  = ($a['timem'] + $averageTimeM);
      $averageTimeS = ($a['times'] + $averageTimeS);
    endforeach;

    $averageScore = ($averageScore / $participantsNumber);
    $averageScore = round($averageScore);

    $averageTimeM = ($averageTimeM * 60);
    $averageTimeS = ($averageTimeM + $averageTimeS);
    $averageTimeM = 0;
    $averageTimeS = ($averageTimeS / $participantsNumber);
    $averageTimeS = round($averageTimeS);
    if (($averageTimeS > 0) && ($averageTimeS < 60)) {
      $averageTimeM = 0;
    }
    if (($averageTimeS > 60) && ($averageTimeS < 120)) {
      $averageTimeM = 1;
      $averageTimeS = $averageTimeS - 60;
    }
    if ($averageTimeS == 120) {
      $averageTimeM = 2;
      $averageTimeS = 0;
    }
    $time = getProperTime($averageTimeM, $averageTimeS);

    $successTaskPercent = round(($successTask / $participantsNumber) *100);

    $array = ["averageScore"=>$averageScore,
              "time"=>$time,
              "participantsNumber"=>$participantsNumber,
              "successTask"=>$successTask,
              "successTaskPercent"=>$successTaskPercent];
    echo json_encode($array);
  }
?>
