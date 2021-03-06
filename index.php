<?php
	require 'admin/includes/db.php';
	include 'admin/includes/message-controllers.php';
	include 'admin/includes/portfolio-controllers.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>My Personal Website</title>
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  </head>

  <body>
  
  <header id="head" class="the-header">
	  	<div class="nav-left">
		<h2 class="logo"><a href="#">Demola Akinpelu</a></h2>
		</div>
		<div class="nav-right">
			<ul class="our-nav">
			  <li><a href="#head">Home</a></li>
			  <li><a href="#experience">Experience</a></li>
			  <li><a href="#portfolio">Portfolio</a></li>
			  <li><a href="#contact">Contact me</a></li>
			</ul>
		</div>
  </header>
  
  <main>
	<section class="banner">
	<img src="assets/img/me.jpg" alt="passport" class="banner-img img-format">
	<h2>Hello, I’m Demola Akinpelu</h2>
	<p>Software Engineer & IT Consultant</p>
	
	</section>
	<section id="experience" class="container">
	<div class="card">
		<h2>Background</h2>
        <p>I’m an a full stack web developer and software enginner who loves everything about the web. I've lived in lots of different places and have worked in lots of different jobs. I’m excited to bring my life experience to the process of building fantastic looking websites.</p>
        <p>I’ve worked with some Tier 1 banks in Nigeria and I love entrepreneurship, I am a life-long learner who's always interested in expanding my skills.</p>
	</div>
	<div class="card">
		<h2>Goals</h2>
        <p>I am an expert in many skills and technology and I will coach you to master the process of building web sites and increase your knowledge, skills and abilities in:</p>
        <ul class="skills">
          <li>HTML</li>
          <li>CSS</li>
          <li>Bootstrap</li>
          <li>Wordpress</li>
          <li>JavaScript</li>
        </ul>
        <p>I’d like to work with you in your journey to being a web designer who can build an impressive online presence for clients.</p>
	</div>
	</section>
	<section id="portfolio">
			<div class="mysections">
			<img class="myicon" src="assets/img/camera.png">
			<h2 class="headings">My Portfolio</h2>
			</div>
			<div class="container">
			<?php while ( $row = $result->fetch_assoc() ): ?>  
			<div class="photo-container">
				<div class="photo">
				  <img src="assets/img/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">	
				    <div class="photo-overlay">
					  <h3><?php echo $row['title']; ?></h3>
					  <p><?php echo $row['description']; ?></p>
					    <a href="<?php echo $row['url']; ?>" target="_blank">View Project</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			
	</div>	
	</section>
	<section id="contact">
		<div class="mysections">
		<img class="myicon" src="assets/img/message.png" alt="message icon">
	    <h2 class="headings">Contact</h2>
		<p class="subheadings">Have a question? Ask me anything.</p>
		</div>

		<form action="index.php#contact" method="POST" class="form-format">
			<?php if ( !empty($successMessage) ): ?>
                <div class="form-success"> <?php echo $successMessage; ?> </div>
			<?php endif; ?>
			<div>
			<label for="fullname" class="form-label">Full Name</label><br>
			<input id="fullname" class="form-input" type="text" name="full-name" placeholder="e.g John Doe" value="<?php echo $fullname ; ?>">
			</div>
			<?php if ( !empty($fullnameErr) ): ?>
				<div class="form-errors"> <?php echo $fullnameErr; ?> </div>
			<?php endif; ?>
			
			<div>
			<label for="youremail" class="form-label">Your Email Address</label><br>
			<input id="youremail" class="form-input" type="email" name="email-address" placeholder="e.g me@yahoo.com" value="<?php echo $email ; ?>">
            </div>
			<?php if ( !empty($emailErr) ): ?>
				<div class="form-errors"> <?php echo $emailErr; ?> </div>
			<?php endif; ?>
			
			<div>
			<label for="yourphone" class="form-label">Your Phone Number</label><br>
			<input id="yourphone" class="form-input" type="tel" name="phone-number" placeholder="e.g 08012345678" pattern="[0-9]{11}" maxlength="11" value="<?php echo $phoneNumber ; ?>">
			</div>
			<?php if ( !empty($phoneNumberErr) ): ?>
				<div class="form-errors"> <?php echo $phoneNumberErr; ?> </div>
			<?php endif; ?>
			
            <div>
			<label for="subject"class="form-label">Subject</label><br>
			<input id="subject" class="form-input"type="text" name="subject" value="<?php echo $subject ; ?>">
			</div>
			<?php if ( !empty($subjectErr) ): ?>
				<div class="form-errors"> <?php echo $subjectErr; ?> </div>
			<?php endif; ?>
			
			<div>
			<label for="message" class="form-label">Enter Your Message</label><br>
			<textarea id="message" class="form-input" rows="5" name="message" >
				<?php echo $messageBody ; ?>
			</textarea>
			</div>
			<?php if ( !empty($messageBodyErr) ): ?>
				<div class="form-errors"> <?php echo $messageBodyErr; ?> </div>
			<?php endif; ?>
			<button type="submit" class="form-button" name="contact-submit">Send Message</button>
		</form>
	</section>
  
  
  </main>
  
  <footer>
  		<ul>
			<li><a href="#" class="social"><img class="myicon" src="assets/img/twitter.png" alt="twitter icon"><br>Twitter</a></li>
			<li><a href="#" class="social"><img class="myicon" src="assets/img/linkedin.png" alt="linkedin icon"><br>Linkedin</a></li>
			<li><a href="#" class="social"><img class="myicon" src="assets/img/github.png" alt="github icon"><br>Github</a></li>
		</ul>
		 <p class="copyright">Copyright 2018. 'Demola Akinpelu. All Right Reserved</p>
  </footer>
 
	
</body>
</html>
