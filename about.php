
<!-- Header -->

<?php
  session_start();
  $title= "«RIG» - About Us";
  require 'includes/header.php';
?>

<!-- Content -->

<script src="js/slider.js"></script>
<script src="js/filter.js"></script>
<div class="wrapper">
	<div id="left-right">
	  <article class="block0">
		  <h2> Who We are? </h2>
	  	<p> Our club specializes in robotics. We teach our students mathematical-logical thinking, engineering design and programming skills.</p>
	  	<p> All Teachers have the qualifications of Computer Science, a Certificate of IELTS with 6.5 and higher score, knowledge of at least 2 programming languages.</p>
	  	<p> Chief Supervisor: Meirzhanov Marat Samatovich</p>
	  	<p> 3-fold owner of 1 place in the last few years of World Robot Olympiad. Winner of the 2nd place of the ICPC Team Olympiad</p>
    </article>
    <hr>
    <article class="block1">
    	<h2> Facilities: </h2>
		  <ol>
		   	<li> LEGO NXT 2.0 Set - the official Lego designers, which is the second generation of designers using motors, sensors and computing controllers.</li>
		  	<li>LEGO EV3 Mindstorm Set - the official Lego constructors that are used for international competitions (WRO). They are the third generation of this type of designers.</li>
		  	<li>BIOLOID - a set from the Korean company, which includes small servos and independent modules. With their help, robots of various designs can be assembled, for example wheeled or walking humanoid robots.</li>
		  	<li>Arduino Uno - hardware and software for building simple automation and robotics systems, aimed at non-professional users.</li>
	  	</ol>
      <p><b><u>*Press on the dots...</u></b></p>
	  	<div class="slideshow-container">
	  		<div class="mySlides fade">
			    <div class="numbertext">1 / 4</div>
			    <img src="img/ev3.jpg" style="">
		  	</div>
			  <div class="mySlides fade">
			    <div class="numbertext">2 / 4</div>
  		    <img src="img/nxt.jpg" style="">
			  </div>
		  	<div class="mySlides fade">
		      <div class="numbertext">3 / 4</div>
  	      <img src="img/bioloid.jpg" style="">
		  	</div>
		  	<div class="mySlides fade">
			    <div class="numbertext">4 / 4</div>
          <img src="img/arduino.jpeg" style="">
	  		</div>
		  	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			  <a class="next" onclick="plusSlides(1)">&#10095;</a>
	    </div>
      <div style="text-align:center">
	      <span class="dot" onclick="currentSlide(1)"></span>
	      <span class="dot" onclick="currentSlide(2)"></span>
	      <span class="dot" onclick="currentSlide(3)"></span>
	      <span class="dot" onclick="currentSlide(4)"></span>
      </div>
    </article>
    <hr>
    <article class="block2">
    	<h2> PhotoGallery: </h2>
    	<section class="photoGallery">
        <div class="toggles">
          <button class="toggle-button" id="showall">SHOW ALL</button>
          <button class="toggle-button" id="daily">#DAILY</button>
          <button class="toggle-button" id="wro">#WRO</button>
          <button class="toggle-button" id="work">#OUR WORKS</button>
          <button class="toggle-button" id="team">#OUR TEAM</button>
        </div>
        <div class="posts">
          <div class="post daily">
          	<img src="img/13.jpg" alt="pic1.jpg">
          </div>
          <div class="post wro">
          	<img src="img/10.jpg" alt="pic2.jpg">
	        </div>
	        <div class="post daily">
	        	<img src="img/15.jpg" alt="pic3.jpg">
	        </div>
	        <div class="post wro">
	        	<img src="img/2.jpg" alt="pic4.jpg">
	        </div>
	        <div class="post work">
	        	<img src="img/11.jpg" alt="pic5.jpg">
	        </div>
	        <div class="post daily">
	        	<img src="img/14.jpg" alt="pic6.jpg">
	        </div>
	       	<div class="post wro">
	        	<img src="img/1.jpg" alt="pic7.jpg">
	        </div>
	       	<div class="post work">
	        	<img src="img/6.png" alt="pic8.jpg">
	        </div>
	       	<div class="post work">
	        	<img src="img/7.png" alt="pic9.jpg">
	        </div>
	       	<div class="post team">
	       		<img src="img/team.jpg" alt="pic10.jpg">
	       	</div>
	      </div>
	    </section>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
