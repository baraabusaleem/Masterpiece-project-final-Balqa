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
				// echo "<script>alert('Product  has already been added to the cart ')</script>";

                header("location:Dvers.php?id={$_GET['id']}");
             
            } else {
                $item_array = array(
                    'product_id' => $_POST['add_to_cart_id'],
                    'product_price' => $_POST['product_price'],
                    'product_name' => $_POST['product_name'],
                    'product_image' => $_POST['product_image'],
					'quantity'=>1,
                   
                );
                $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
                header("location:Dvers.php");
      
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
            header("location:Dvers.php}");
      
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

		<title>protection</title>

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

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="hot_deals.php">Hot Deals</a></li>
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

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
								<form action="" method="POST">
									<input id="price-min" type="number" name="minPrice">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number" name="maxPrice" >
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<button class="search-btn" type="submit">filter</button>
		                        </form>
							</div>
						</div>
						<!-- /aside Widget -->

						

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<div class="product-widget">
								
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/mon1.jpg" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">monitor</p>
									<h3 class="product-name"><a href="product.php?product_id=17">LG 24MP88HV FULL HD MONITOR</a></h3>
									<h4 class="product-price">$159.00 <del class="product-old-price">$200.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/602754cbed963422f151078b0a2ff76f_middle.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">camera</p>
									<h3 class="product-name"><a href="product.php?product_id=14">DTBG CAMERA BACKPACK 15.6"
</a></h3>
									<h4 class="product-price">$30.00 <del class="product-old-price">$40.00</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								

								
							</div>
							<ul class="store-grid">
							
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							<?php  
							$min=1;
							$max=1000;
							if(isset($_POST['minPrice'])){
								$min=$_POST['minPrice'];
							$max=$_POST['maxPrice'];
							}
							$query = "SELECT * FROM products where product_keywords='Dvers' AND product_price BETWEEN $min AND $max";
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
										<h4 class="product-price">$<?php echo $row['product_price']; ?> </h4>
									
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
						<!-- /store products -->

						<!-- store bottom filter -->
						<!-- <div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div> -->
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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
