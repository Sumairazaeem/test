<!-- <script type="text/javascript">

	function checkout()
	{
	
  var x = document.getElementById("usercheckout");
  var y =document.getElementById("cart");
    x.style.display = "block";
    y.style.display ="none";



}

document.write(5+6);
  
</script>
 -->
<?php




session_start();
$product_ids=array();
//session_destroy();

//check if add btn is presed
if (filter_input(INPUT_POST, 'add_to_cart')) {
	# code...
	if(isset($_SESSION['shopping_cart']))
	{
		$count=count($_SESSION['shopping_cart']);

		$product_ids=array_column($_SESSION['shopping_cart'], 'id');

		if (!in_array(filter_input(INPUT_GET, 'id'),$product_ids)) {
			# code...
			$_SESSION['shopping_cart'][$count]= array
		(
			'id' => filter_input(INPUT_GET,'id'),
			'name' => filter_input(INPUT_POST,'name'),
			'price' => filter_input(INPUT_POST,'price'),
			'quantity' => filter_input(INPUT_POST,'quantity')

		);

		}

		else
		{
			for ($i=0; $i <count($product_ids) ; $i++) { 
				# code...
				if ($product_ids[$i]==filter_input(INPUT_GET, 'id')) {
					# code...
					$_SESSION['shopping_cart'][$i]['quantity']+=filter_input(INPUT_POST, 'quantity');
				}
			}
		}

	}
	else
	{
		//if cart does not exist create first product with arr key 0
		$_SESSION['shopping_cart'][0]= array
		(
			'id' => filter_input(INPUT_GET,'id'),
			'name' => filter_input(INPUT_POST,'name'),
			'price' => filter_input(INPUT_POST,'price'),
			'quantity' => filter_input(INPUT_POST,'quantity')

		);

	}


}
if (filter_input(INPUT_GET,'action')=='delete') {
	# code...
	foreach ($_SESSION['shopping_cart'] as $key => $products) {
		# code...
		if($products['id']==filter_input(INPUT_GET, 'id'))
		{
			unset($_SESSION['shopping_cart'][$key]);
		}


	}

	$_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
}


// pre_r($_SESSION);
function pre_r($array)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}





if(filter_input(INPUT_POST, 'checkout')){

	echo '<style type="text/css">
        #usercheckout {
            display: block!important;
        }

        #cart {
            display: none!important;
        }
        </style>';
   
 }




if(filter_input(INPUT_POST, 'usinfo'))

{
	$connect=mysqli_connect('localhost','root','kk210597','onlineorder');

 $name=mysqli_real_escape_string($connect,$_POST['name']);

$ordertype=mysqli_real_escape_string($connect,$_POST['ordertype']);
$address=mysqli_real_escape_string($connect,$_POST['address']);
$email=mysqli_real_escape_string($connect,$_POST['email']);
$credit=mysqli_real_escape_string($connect,$_POST['credit']);
$location=mysqli_real_escape_string($connect,$_POST['location']);
$phonenumber=mysqli_real_escape_string($connect,$_POST['phonenumber']);

$myquery= "INSERT INTO orderc(cname,ordertype,caddress,cemail,ccardno,location,cphoneno) VALUES ('$name','$ordertype','$address','$email','$credit','$location','$phonenumber')";
mysqli_query($connect,$myquery);

$orderid= mysqli_insert_id($connect);

$max=count($_SESSION['shopping_cart']);
        for($i=0;$i<$max;$i++){
            $pid=$_SESSION['shopping_cart'][$i]['id'];
            $pname=$_SESSION['shopping_cart'][$i]['name'];

            $pqty=$_SESSION['shopping_cart'][$i]['quantity'];
            $pprice=$_SESSION['shopping_cart'][$i]['price'];
            // mysql_query("insert into orderdetail values ($orderid,$pid,$q,$price)");

            $myquery1= "INSERT INTO orderdetails(orderid,pid,pname,pqty,pprice) VALUES ('$orderid','$pid','$pname','$pqty','$pprice')";
mysqli_query($connect,$myquery1);

        }

        die('Thank You! your order has been placed!');

        //pre_r($_SESSION);
        unset($_SESSION['shopping_cart']);
	session_destroy();
        die('Thank You! your order has been placed!');
     //session_unset(); 

 //        unset($_SESSION['shopping_cart']);
	// session_destroy();

// mysqli_query("INSERT INTO orderc(cname,ordertype,caddress,cemail,ccardno,location,cphoneno) VALUES ('$name','$ordertype','$address','$email','$credit','$location','$phonenumber')");

//pre_r($_SESSION);



// else
// {
// 	pre_r($_SESSION);
// }




	
	
	// $max=count($_SESSION['shopping_cart']);
 //        for($i=0;$i<$max;$i++){
 //            $pid=$_SESSION['shopping_cart'][$i]['id'];
 //            $pqty=$_SESSION['cart'][$i]['quantity'];
 //            $pprice=$_SESSION['cart'][$i]['price'];
 //            mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
 //        }
 //        die('Thank You! your order has been placed!');
	// session_destroy();

     }

     



?>


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
							<a class="nav-link" href="cart.php" style="color: #e00000">Order Online</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="team.html">The Team</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Reviews.php">Menu</a>
						</li>
					</ul>
				</div>
			</div>
			
		</nav>


			<div class="orderonline">
			
		</div>
		<div class="captionh text-center">
			<h1>Order Online</h1>
			<div class="headingm-underline"></div>
			<h3>Enjoy a warm meal at home</h3>
			
			<!-- <a class="btn btn-outline-light btn-lg" href ="#aboutus">Order Online</a> -->

		</div>

	<!---usercheckout---->

<!-- <form action="cart.php" method="post"> -->

	<div class="usercheckout" id="usercheckout" style="display: none;">
    <div class="jumbotron">
			<div class="narrow col-12">
				<h3 class="heading text-center">Provide Details</h3>
				<div class="heading-underline"></div>
				<form action="cart.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="lastname">Dine In/Takeaway</label>
      <input type="text" class="form-control" id="ordertype" name="ordertype" placeholder="Dine In/Takeaway" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
  </div>
  <div class="form-group">
    <label for="reason">E-mail Address?</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="user123@example.com?" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="position">Credit Card No</label>
      <input type="text"class="form-control" id="credit" name="credit" placeholder="(0-9)max9" pattern="[0-9]{9}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="location">Select Location</label>
      <select id="location" class="form-control" name="location" required>
        <option selected>Location</option>
        <option>Bahadurabad</option>
        <option>Tipu Sultan</option>
        <option>Sindhi Muslim</option>
        <option>Tariq Road</option>
        <option>D.H.A</option>
        <option>Port Grand</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="phonenumber">Phone Number</label>
      <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="(0-9)max10" pattern="[0-9]{10}" required>
    </div>
  </div>
  
 <!--  <button type="submit" name="usinfo" class="btn btn-primary">Submit</button> -->

 <input type="submit" name="usinfo" class="btn btn-primary"  value="Submit">
</form>
				
			</div>

		</div>

  </div>

<!-- </form> -->

	<!---end user checkout--->

	<div class="cart" id="cart" style="display: block;">

<!-- <div class="row text-center">
					
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h3>Dish Name</h3>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h3>Price</h3>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<h3>Quantity</h3>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">s
						<div class="service">
							
							<h3>Add To Cart</h3>
						</div>
					</div>
					
				</div> -->

				<div class="headp">
			<hr class="light">

			<h3 class="spacetext text-center">Place Your Order</h3>
				<hr class="light">

			
		</div>
				
				

 
 <div class="container">


 	<?php

$connect=mysqli_connect('localhost','root','kk210597','onlineorder');


	$query='SELECT *FROM products ORDER by id ASC';
	$result=mysqli_query($connect,$query);
	if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			
				while($products=mysqli_fetch_assoc($result)){
					// print_r($products);
					?>
					<form method="post" action="cart.php?action=add&id=<?php echo $products['id'];?>">


					<div class="row text-center" style="margin-top: 15px;">
						
					
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h6><?php echo $products['name'];?></h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h6><?php echo $products['price'];?></h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<input type="text" name="quantity" class="form-control" value="1"/>
						</div>
					</div>

					<!--hidden fields-->
					<input type="hidden" name="name" value="<?php echo $products['name']; ?>"/>
					<input type="hidden" name="price" value="<?php echo $products['price']; ?>"/>


					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<input type="submit" name="add_to_cart" class="btn btn-info" value="Add To Cart">

						</div>
					</div>
				
					
				</div>
				</form>

					<!--html data print--->
					

					<?php

				}
			}
		}
	?>

	<div style="clear: both">
		
	</div>
	<br/>
	<div class="table-responsive">
		<table class="table">
			<tr><th colspan="5"><h3>Order Details</h3></th></tr>
			<tr>
				<th width="40%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price</th>
				<th width="15%">Total</th>
				<th width="5%">Action</th>
			</tr>
			<?php
			if(!empty($_SESSION['shopping_cart'])){

				$total=0;
				foreach ($_SESSION['shopping_cart'] as $key => $products) :
					# code...
				
			?>
			<tr>
				<td><?php echo $products['name']; ?></td>

				<td><?php echo $products['quantity']; ?></td>

				<td>$<?php echo $products['price']; ?></td>

				<td>$<?php echo number_format($products['quantity'] * $products['price'], 2); ?></td>
				
				<td>
					<a href="cart.php?action=delete&id=<?php echo $products['id'];?>">
						<div class="btn-danger">Remove</div>
					</a>
				</td>
			</tr>

<?php
$total=$total+($products['quantity'] * $products['price']);
endforeach;
?>
<tr>
	<td colspan="3" align="right">Total</td>
	<td align="right">Rs<?php echo number_format($total,2);?></td>
	<td></td>
</tr>
<tr>
	<td colspan="5">
		<?php
		if(isset($_SESSION['shopping_cart'])){
		if(count($_SESSION['shopping_cart'])>0){
         ?>

         <!-- <a href="#" class="button" name="checkout">Checkout</a> -->
         <form action="cart.php" method="post">
         <input type="submit" name="checkout" class="btn btn-info"  value="Check Out">
     </form>
         <?php
     }}
     


         ?>
		
	</td>
</tr>
<?php
}
?>
			
		</table>
		
	</div>
	
</div>
</div>




				<!-- <div class="container">
	<div class="jumbotron">
		<div class="row">
			
					
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h6>Crispy Calamari</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h6>RS 400</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<input id="quantity" type="text" name="quantity">
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<a class="btn btn-outline-light btn-primary" href ="#">Add to Cart</a>

						</div>
					</div>
					
				</div>
			</div>
				</div> -->


			<!-- <div class="container">
	
		<div class="row">
			
					
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h6>Wasabi Prawns</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							<h6>RS 460</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<input id="quantity" type="text" name="quantity">
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
						<div class="service">
							
							<a class="btn btn-outline-light btn-primary" href ="#">Add to Cart</a>

						</div>
					</div>
					
				</div>
			</div>
				 -->


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
