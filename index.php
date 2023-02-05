<?php
include './admin_area/includes/db.php';
session_start();

?>
<?php

if (isset($_POST["add"])) {
    $ok = 1;
    if ($ok == 1) {
        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION["cart"], 'product_id');
          
            if (in_array($_POST['add_to_cart_id'], $items)) {
				echo "<script>alert('Product  has already been added to the cart ')</script>";

              //  header("location:index.php?id={$_GET['id']}");
             
            } else {
                $item_array = array(
                    'product_id' => $_POST['add_to_cart_id'],
                    'product_price' => $_POST['product_price'],
                    'product_name' => $_POST['product_name'],
                    'product_image' => $_POST['product_image'],
					'quantity'=>1,
                   
                );
                $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
                header("location:index.php");
      
            }
        } else {
            $item_array = array(
                'product_id' => $_POST['add_to_cart_id'],
                'product_price' => $_POST['product_price'],
                'product_name' => $_POST['product_name'],
                'product_image' => $_POST['product_image'],
				'quantity'=>1,
               
            );
            $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
            header("location:index.php}");
      
        }
    }
}else{
 
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Security-Store</title>

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
<style>
	 .View-Product-btn {

		position: relative;
  border: 2px solid transparent;
  height: 40px;
  padding: 0 30px;
  background-color: #ef233c;
  color: #FFF;
  text-transform: uppercase;
  font-weight: 700;
  border-radius: 40px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;


}
.View-Product-btn>i  {
  position: absolute;
  left: 0;
  top: 0;
  width: 40px;
  height: 40px;
  line-height: 38px;
  color: #D10024;
  opacity: 0;
  visibility: hidden;
}


.View-Product-btn:hover  {
  background-color: #FFF;
  color: #D10024;
  border-color: #D10024;
  padding: 0px 30px 0px 50px;
}

.View-Product-btn:hover>i {
  opacity: 1;
  visibility: visible;
}
.newsletter-btn {
  border-radius: 40px 40px 40px 40px;
}
</style>
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
						<!-- <li><a href="#">About Us</a></li> -->
						<li><a href="store.php">Store</a></li>
						<li><a href="camera.php">camera</a></li>
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

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/cam.png" alt="">
							</div>
							<div class="shop-body">
								<h3>camera<br>Collection</h3>
								<a href="camera.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
 <!-- shop -->
<div class="col-md-4 col-xs-6">
	<div class="shop">
		<div class="shop-img">
		<img src="./img/nvr-recorders_300.jpg" alt="">
		</div>
		<div class="shop-body">
			<h3>Dvers<br>Collection</h3>
			<a href="Dvers.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
<!-- /shop -->
<!-- shop -->
<div class="col-md-4 col-xs-6">
	<div class="shop">
		<div class="shop-img">
		<img src="./img/ls650kcm-ef.png" alt="">
		</div>
		<div class="shop-body">
			<h3>Monitor<br>Collection</h3>
			<a href="monitor.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/momre.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="accessories.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
							<img src="./img/store.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Store<br>Collections</h3>
								<a href="store.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection </p>
							<a class="primary-btn cta-btn" href="hot_deals.php">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New camera</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
								
									<div class="products-slick" data-nav="#slick-nav-2">
									
										<?php  
							$query = "SELECT * FROM products where product_keywords='camera'";
							$con->query($query);
							if ($result = $con->query($query)) {
							  while($row = $result->fetch_assoc() ){?>
							

						
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
									<img src="./admin_area/product_images/<?php echo $row['product_img1']; ?>" alt="">
										<div class="product-label">
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $row['product_keywords']; ?></p>
										<h3 class="product-name"><a href="product.php?product_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['product_price']; ?> <del class="product-old-price">$<?php echo $row['past_price']; ?></del></h4>
									
										<div class="product-btns">
										
											
											<a class="quick-view" href="product.php?product_id=<?php echo $row['product_id']; ?>"><span class="tooltipp">quick view</span></a>
							              
										</div>
									</div>
									<div class="add-to-cart">
									<form action="" method="POST">
											<input type="hidden" name="add_to_cart_id" value="<?php echo $row['product_id']; ?>">
											<input type="hidden" name="product_name" value="<?php echo $row['product_title']; ?>">
											<input type="hidden" name="product_image" value="<?php echo $row['product_img1']; ?>">
											<input type="hidden" name="product_price" value="<?php echo $row["product_price"]; ?>">
											<button type="submit" name="add" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									
										</form>
									</div>
								</div>
							</div>
							<?php  } } ?>
						
										
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
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
							<form action="contact_us.php">
								<!-- <input class="input" type="email" placeholder="Enter Your Email"> -->
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Contact Us</button>
							</form>
							
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
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<!-- <script src="js/bootstrap.min.js"></script> -->
		<script src="js/slick.min.js"></script>
		<!-- <script src="js/nouislider.min.js"></script> -->
		<!-- <script src="js/jquery.zoom.min.js"></script> -->
		<script src="js/main.js"></script>

	</body>
</html>
