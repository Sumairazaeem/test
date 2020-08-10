<?php
session_start();

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Serefe/Menu</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

	<body>




		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><img src="images/logo.png"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<span class="navbar-toggler-icon"></span>

					
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
						<a class="nav-link" href="Resturant.html">Home</a>
					</li>
						<li class="nav-item">
							<a class="nav-link" href="Menu.html">Menu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Locations.html">Locations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cart.php">Order Online</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php"style="color: #e00000">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="team.html">The Team</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Reviews.php">Reviews</a>
						</li>
					</ul>
				</div>
			</div>
			
		</nav>


		<?php

$connect=mysqli_connect('localhost','root','kk210597','onlineorder');

if (!$connect) {
  die('Could not connect: ' . mysql_error());
}
else{
if(filter_input(INPUT_POST, 'submit'))
{


	 $fname=mysqli_real_escape_string($connect,$_POST['fname']);
	 $lname=mysqli_real_escape_string($connect,$_POST['lname']);
	 $phno=mysqli_real_escape_string($connect,$_POST['phno']);
	 $email=mysqli_real_escape_string($connect,$_POST['email']);
	 $location=mysqli_real_escape_string($connect,$_POST['exampleRadios']);
	 $fquality=mysqli_real_escape_string($connect,$_POST['fquality']);
	 $cservice=mysqli_real_escape_string($connect,$_POST['cservice']);
	 $rclean=mysqli_real_escape_string($connect,$_POST['rclean']);
	 $rev=mysqli_real_escape_string($connect,$_POST['comment']);


	 echo $fname;
	 echo $lname;
	 echo $phno;
	 echo $email;
	 echo $location;
	 echo $fquality;
	 echo $cservice;
	 echo $rclean;

	 $myquery= "INSERT INTO reviews(fname,lname,email,location,fquality,cservice,rclean) VALUES ('$fname','$lname','$email','$location','$fquality','$cservice','$rclean')";

$result=mysqli_query($connect,$myquery) ;

$myquery1= "INSERT INTO printreviews(fname,cooment,location) VALUES ('$fname','$rev','$location')";
$result1=mysqli_query($connect,$myquery1) ;

if ($result === FALSE) {

	die("Query failed!");
	print_r($fname);

	}

	else{

die('Thank You! your order has been placed!');

}



}
}

?>

		<div class="header9" >
			
		</div>
		<div class="captionh text-center">
			<h1>Contact Us</h1>
			<div class="headingm-underline"></div>
			</div>
			<div class="headp text-center">

			<h2><b>YOUR REVIEWS</b></h2>
			
		</div>
		<!---Start Aboutus-->
	<div id="joinus" class= "offset">
		
			<div class="narrow col-12">
				
				<form action="contact.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname">First Name*</label>
      <input type="text" class="form-control" id="firstname" name="fname" placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="lastname">Last Name*</label>
      <input type="text" class="form-control" id="lastname" name="lname" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="phoneno">Phone no*</label>
    <input type="text" class="form-control" id="phoneno" name="phno" placeholder="123456789" required>
  </div>
  <div class="form-group">
    <label for="email">E-mail*</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="abcd@email.com" required>
  </div>
  <p><b>Location?</b></p>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Buhadurabad">
  <label class="form-check-label" for="exampleRadios1">
    Bahadurabad
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Sindhi Muslim">
  <label class="form-check-label" for="exampleRadios2">
    Sindhi Muslim
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Tipu Sultan">
  <label class="form-check-label" for="exampleRadios3">
    Tipu Sultan Road
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="Tariq Road">
  <label class="form-check-label" for="exampleRadios4">
    Tariq Road
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="DHA">
  <label class="form-check-label" for="exampleRadios5">
    DHA
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="Port Grand">
  <label class="form-check-label" for="exampleRadios6">
   Port Grand
  </label>
</div>
   <div class="form-group">
  <label for="comment"><b>Please tell us about your experience:</b></label>
  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
</div> 
<p><b>Food Quality?</b></p>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineCheckbox1" value="5" name="fquality">
  <label class="form-check-label" for="inlineCheckbox1">5</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineCheckbox2" value="4" name="fquality">
  <label class="form-check-label" for="inlineCheckbox2">4</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineCheckbox3" value="3" name="fquality">
  <label class="form-check-label" for="inlineCheckbox3">3</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineCheckbox4" value="2" name="fquality">
  <label class="form-check-label" for="inlineCheckbox4">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineCheckbox5" value="1" name="fquality">
  <label class="form-check-label" for="inlineCheckbox5">1</label>
</div>
  <p><b>Customer Service</b></p>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="cs1" value="5" name="cservice">
  <label class="form-check-label" for="cs1">5</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="cs2" value="4" name="cservice">
  <label class="form-check-label" for="cs2">4</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="cs3" value="3" name="cservice">
  <label class="form-check-label" for="cs3">3</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="cs4" value="2" name="cservice">
  <label class="form-check-label" for="cs4">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="cs5" value="1" name="cservice">
  <label class="form-check-label" for="cs5">1</label>
</div><br>
<p><b>Resturant cleanliness</b></p>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="rs1" value="5" name="rclean">
  <label class="form-check-label" for="rs1">5</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="rs2" value="4" name="rclean">
  <label class="form-check-label" for="rs2">4</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="rs3" value="3" name="rclean">
  <label class="form-check-label" for="rs3">3</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="rs4" value="2" name="rclean">
  <label class="form-check-label" for="rs4">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="rs5" value="1" name="rclean">
  <label class="form-check-label" for="rs5">1</label>
</div><br>
<!-- <p><b>Would you be more likely to visit Serefe if you could:</b></p>
<div class="form-check form-check">
  <input class="form-check-input" type="checkbox" id="v1" value="option1" name="opi[]">
  <label class="form-check-label" for="v1">Sit down immediately upon entering, order, and pay from your table</label>
</div>
<div class="form-check form-check">
  <input class="form-check-input" type="checkbox" id="v2" value="option2" name="opi[]">
  <label class="form-check-label" for="v2">Place your order and pay via kiosk, sit down, and have your food served to you</label>
</div>
<div class="form-check form-check">
  <input class="form-check-input" type="checkbox" id="v3" value="option3" name="opi[]">
  <label class="form-check-label" for="v3">Don't change anything - The line is a part of the 4R experience</label>
</div><br> -->
  <!-- <button type="submit" class="btn btn-primary" name="submit">Submit</button> -->
  <input type="submit" name="submit" class="btn btn-primary"  value="Send">
</form>
</div>



</div>

				
			

	<!---End Aboutus--->
	<footer>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-4">
					<img src="images/logo.png">
					<hr class="light">
					<p>121-121-1211</p>
					<p>serefe@gmail.com</p>
					<p>Sindhi Muslim</p>
					<p>Karachi, Sindh, 0000</p>
				</div>
				<div class="col-md-4">
					<hr class="light">
					<h5>Our Hours</h5>
					<hr class="light">
					<p>Monday-Friday: 10 am-10pm</p>
					<p>Saturday: 11am- 11pm</p>
					<p>Sunday:closed</p>
				</div>
				<div class="col-md-4">
					<hr class="light">
					<h5>Locations</h5>
					<hr class="light">
					<p>City, Area, 0000</p>
					<p>City, Area, 0000</p>
					<p>City, Area, 0000</p>
					<p>City, Area, 0000</p>
					
				</div>
				
				<div class="col-12">
					<hr class="light">
					<strong>Find us on Social Media<br></strong>
				<a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook-square"></i></a>
				<a href="https://www.twitter.com/" target="blank"><i class="fab fa-twitter-square"></i></a>
				<a href="https://www.instagram.com/" target="blank"><i class="fab fa-instagram"></i></a>
			</div>
				<div class="col-12">
					<hr class="light-100">
					<h5>&copy; Serefe.com</h5>
				</div>
			</div>
		</div>
	</footer>

		<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
		</body>
		</html>
