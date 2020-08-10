<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Order Online</title>
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
							<a class="nav-link" href="contact.php">Contact Us</a>
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


			<div class="online1">
			
		</div>
		<div class="captionh text-center">
			<h1>Customer Feedback</h1>
			<div class="headingm-underline"></div>
			<h3>We Value Our Customer's Opinion</h3>
			
			<!-- <a class="btn btn-outline-light btn-lg" href ="#aboutus">Order Online</a> -->

			<div class="headp">
			<hr class="light">

			<h3 class="spacetext text-center" style="color: white;">Reviews</h3>
				<hr class="light">

			
		</div>
				
				

 
 <div class="container">


 	<?php

$connect=mysqli_connect('localhost','root','kk210597','onlineorder');


	$query='SELECT *FROM printreviews ORDER by id ASC';
	$result=mysqli_query($connect,$query);
	if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			
				while($printreviews=mysqli_fetch_assoc($result)){
					// print_r($products);
					?>
					<!-- <form method="post" action="contact.php"> -->


					<div class="row text-center" style="margin-top: 15px;">
						
					
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
						<div class="service">
							<h6><?php echo $printreviews['fname'];?></h6>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
						<div class="service">
							<h6><?php echo $printreviews['cooment'];?></h6>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
						<div class="service">
							
							<h6><?php echo $printreviews['location'];?></h6>
						</div>
					</div>

					<!--hidden fields-->
					


					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<!-- <input type="submit" name="add_to_cart" class="btn btn-primary btn-lg" value="Submit Review"> -->

						</div>
					</div>
				
					
				</div>
				<!-- </form> -->

					<!--html data print--->
					

					<?php

				}
			}
		// }

?>

<form method="post" action="contact.php">
		<input type="submit" name="add_to_cart" class="btn btn-primary btn-lg" value="Submit Review">
		</form>

		<?php

	}
	?>

		</div>
</div>








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
<!--- End of Script Source Files---->
</body>
</html>