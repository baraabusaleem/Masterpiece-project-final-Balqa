
<?php
session_start();
include './admin_area/includes/db.php';

// if you not user or admin
if (!isset($_SESSION['user_name'])){
  header("location: ./dashboard/login.php");
}

// if shopping cart is empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
	
  header("location: store.php");
}

?>

<?php
  
  if(isset($_SESSION['user_id']))
  {
      $user_id = mysqli_real_escape_string($con, $_SESSION['user_id']);
      $query = "SELECT * FROM users WHERE user_id='$user_id' ";
      $query_run = mysqli_query($con, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          $user = mysqli_fetch_array($query_run);}}
          ?>

<?php

 
if(isset($_POST['submit'])){
$user_id =$_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$amount =$_GET["total"];

$addData="INSERT INTO orders(user_name,user_email,user_country,user_address ,user_phone ,amount ) 
VALUES('$name','$email','$country','$address','$phone','$amount')";
$run= mysqli_query($con,$addData);

if($run){

	echo "<script>alert('Your Order has been PLaced successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
	unset ($_SESSION["cart"]);

	}
	
}
 ?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>protection - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<?php include './layouts/header.php';?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="store.php">Store</a></li>
						<li><a href="laptop.php">camera</a></li>
						<li><a href="Dvers.php">Dvers</a></li>
						<li><a href="monitor.php">monitors</a></li>
						<li><a href="accessories.php">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<form action =" " method= "post">
							<div class="form-group">
							<label class="form-label" for="form3Example1">Full Name </label>
								<input class="input" type="text" id="name" name="name"placeholder="Full Name" value=<?php echo  $user['user_name'];  ?>>
							</div>
							<div class="form-group">
							<label class="form-label" for="form3Example3">Email address </label>
								<input class="input" type="email" id="email" name="email" placeholder="Email" value=<?php echo  $user['user_email'];  ?>>
							</div>
							<div class="form-group">
							<label class="form-label" for="form3Example1">Address </label>
								<input class="input" type="text" id="address" name="address"  placeholder="Address" value=<?php echo  $user['user_address'];  ?>>
							</div>
							<div class="form-group">
							<label class="form-label" for="form3Example1">Country </label>
								<input class="input" type="text" id="country" name="country"placeholder="Country" value=<?php echo  $user['user_country'];  ?>>
							</div>
							<div class="form-group">
							<label class="form-label" for="form3Example1">Mobile Phone </label>
								<input class="input" type="tel" id="phone" name="phone" placeholder="Mobile phone" value=<?php echo  $user['user_phone'];  ?>>
							</div>
				
						</div>
						<!-- /Billing Details -->

			
			


					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<?php
	if (isset($_SESSION["cart"])) {
		foreach ($_SESSION['cart'] as $key => $value) { 
		
			?>

							<div class="order-products">
								<div class="order-col">
									<div><?php echo $value['product_name'] . " * " . $value['quantity'] ; ?></div>
									<div><?php echo $value['product_price']* $value['quantity'] ; ?> $</div>
								</div>
							</div>
							<?php
}}

?>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>10 $</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?php echo $_GET["total"] ; ?> $</strong></div>
							</div>
						</div>
						<div class="input-checkbox">
							
							<input type="checkbox" id="terms" checked>
							
							<label for="terms" >
								<span></span>
								<strong> Cash on Delivery.</strong>
							</label>
						</div>
						<button name="submit" class="primary-btn order-submit newsletter-btn ">Place order</button>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
</form>
			</div>
			
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>If you have any  <strong>Question or Comment</strong></p>
							<form action="contact us.php">
								<!-- <input class="input" type="email" placeholder="Enter Your Email"> -->
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Contact Us</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php include './layouts/footer.php';?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
