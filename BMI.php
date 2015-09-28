<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BMI Calculator</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <center>
      <img src="images/nametitle.png" class="img-rounded titleimage" alt="Cinque Terre" width="500" height="200" style="position:relative; top:50px">
    </center>

    <ul class="nav nav-pills navbar-custom" id="navbar">
      <li><a href="home.html">About</a></li>
      <li><a href="projects.html">Projects</a></li>
      <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools</a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/BMI.php">BMI Calculator</a></li>
            <li><a href="WClock.html">World Clock</a></li>
          </ul>
      </li>
      <li><a href="contact.html">Contact</a></li>
    </ul>

	<h3 class="col-md-offset-1">Body Mass Index Calculator</h3>
	
	<form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
		<div class="form-group">
			<label class="control-label col-sm-2" for="height">Height(m):</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" placeholder="Enter height" id="height" name="height" maxlength="3">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="weight">Weight(kg):</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" placeholder="Enter weight" id="weight" name="weight" maxlength="3">
			</div>
		</div>
		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
      			<input type="submit" id="submit" name="bmi" value="Calculate BMI" class="btn btn-primary">
    		</div>
  		</div>
	</form>
	
	<?php
		ini_set('display_errors', 0);
		error_reporting(E_ERROR | E_WARNING | E_PARSE); 

		//get input values and calculate BMI
		$height = $_GET["height"];
		$weight = $_GET["weight"];
		
		if(!empty($height) && !empty($weight)){
			if($height != 0)
				$BMI = $weight/($height*$height);
			
			echo "<h3 class=\"col-md-offset-1\">Report:<br></h3>";
			//check for invalid input
			if($height <= 0 || $weight <= 0)
				echo "Wrong input! The height or weight cannot be nonpositive.";
			elseif(preg_match('/[^.0-9]/', $height) || preg_match('/[^.0-9]/', $weight))
				echo "Wrong input!";
			//valid input, classify BMI
			else {
				if($BMI <= 18.5)
					echo "<strong class=\"col-md-offset-1\">You are underweight.</strong>";
				elseif($BMI <= 24.9)
					echo "<strong class=\"col-md-offset-1\">You are at your normal weight.</strong>";
				elseif($BMI <= 29.9)
					echo "<strong class=\"col-md-offset-1\">You are overweight.</strong>";
				elseif($BMI <= 39.9)
					echo "<strong class=\"col-md-offset-1\">You are obese.</strong>";
				else
					echo "<strong class=\"col-md-offset-1\">You are morbidly obese.</strong>";
				echo "<strong>Your BMI is ".substr($BMI, 0, 5).".</strong>";
			}
		}
	?>

	<center>
      <div class="icon">
        <a href="contact.html"><img src="images/mail.png" class="img-circle" width="25" height="25" id="mail"></a>
        <a href="http://www.github.com/tincan24"><img src="images/github.png" class="img-circle" width="25" height="25" id="github"></a>
        <a href="http://www.linkedin.com/in/dereknguyen24"><img src="images/linkedin.png" class="img-circle" width="27" height="27" id="linkedin"></a>
        <a href="http://www.youtube.com/user/24tincan/videos"><img src="images/youtube.png" class="img-circle" width="26" height="26"></a>
      </div>
      <p id="contactmsg">ngderek24@gmail.com<br>Get in touch and check out my work!<br>&copy Derek Nguyen 2015. All rights reserved.</p>
    </center>

</body>
</html>