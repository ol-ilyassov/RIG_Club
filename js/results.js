
//Method that sends request to php file and gets Json file with specific data.
//Function created on the base of Ajax methods.
function getResults(tablename, action, callback) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      //console.log('responseText:' + xmlhttp.responseText);
      try {
        var data = JSON.parse(xmlhttp.responseText);
      } catch(err) {
        console.log(err.message + " in " + xmlhttp.responseText);
        return;
      }
      callback(data);
    }
  };
  xmlhttp.open("GET", "php/getResults.php?action=" + action + "&tablename=" + tablename, true);
  xmlhttp.send();
}

//Displays statistical data for Line Follower Category.
getResults('linefollower', 'getStats', function(data) {
  document.getElementById("aveScoreLF").innerHTML = data.averageScore + " / 30 [max.]";
  document.getElementById("aveTimeLF").innerHTML = data.time + " / 02:00 [max.]";
  document.getElementById("successCompleteLF").innerHTML = data.successTask + " / " + data.participantsNumber + " participants [" + data.successTaskPercent + "%]";
});

//Displays statistical data for Kegelring Category.
getResults('kegelring', 'getStats', function(data) {
  document.getElementById("aveScoreK").innerHTML = data.averageScore + " / 30 [max.]";
  document.getElementById("aveTimeK").innerHTML = data.time + " / 02:00 [max.]";
  document.getElementById("successCompleteK").innerHTML = data.successTask + " / " + data.participantsNumber + " participants [" + data.successTaskPercent + "%]";
});

//Displays list of winners for Line Follower Category.
getResults('linefollower', 'getWinners', function(data) {
  var n = 1;
  for (var key in data) {
    document.getElementById("place" + n + "LF").innerHTML = "<b>\"" + data[key].teamName + "\"</b>| Scores: <b>" + data[key].sumScores + "</b>; Time: <b>" + data[key].time + "</b>";
    n += 1;
  }
});

//Displays list of winners for Kegelring Category.
getResults('kegelring', 'getWinners', function(data) {
  var n = 1;
  for (var key in data) {
    document.getElementById("place" + n + "K").innerHTML = "<b>\"" + data[key].teamName + "\"</b>| Scores: <b>" + data[key].sumScores + "</b>; Time: <b>" + data[key].time + "</b>";
    n += 1;
  }
});
