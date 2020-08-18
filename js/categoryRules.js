
/* - Map & Magnification [Category Rules] - */

//Functions that open zoomed sections of the map.
function openMap1() {
  document.getElementById("score").innerHTML = "Score: 15 points";
  document.getElementById('imgscore').src = "img/map1.png";
}

function openMap2() {
  document.getElementById("score").innerHTML = "Score: 10 points";
  document.getElementById('imgscore').src = "img/map2.png";
}

function openMap3() {
  document.getElementById("score").innerHTML = "Score: 10 points";
  document.getElementById('imgscore').src = "img/map3.png";
}

function openMap4() {
  document.getElementById("score").innerHTML = "Score: 5 points";
  document.getElementById('imgscore').src = "img/map4.png";
}

function openMap5() {
  document.getElementById("score").innerHTML = "Score: 15 points";
  document.getElementById('imgscore').src = "img/map5.png";
}

function openMap6() {
  document.getElementById("score").innerHTML = "Score: 5 points";
  document.getElementById('imgscore').src = "img/map6.png";
}

function openMap7() {
  document.getElementById("score").innerHTML = "Score: 0 points";
  document.getElementById('imgscore').src = "img/map7.png";
}

/* - Video [Category Rules] - */

//Functions that binds specific actions to custom buttons.
function vidplay() {
  var video = document.getElementById("Video1");
  var button = document.getElementById("play");
  if (video.paused) {
    video.play();
    button.textContent = "||";
  } else {
    video.pause();
    button.textContent = ">";
  }
}

function restart() {
  var video = document.getElementById("Video1");
  video.currentTime = 0;
}

function skip(value) {
  var video = document.getElementById("Video1");
  video.currentTime += value;
}
