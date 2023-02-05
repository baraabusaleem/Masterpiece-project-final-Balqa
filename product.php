<?php
include './admin_area/includes/db.php';

session_start();
$product_id="";
if(isset($_GET['product_id'])){
	$product_id=$_GET['product_id'];
}
else{
	$product_id=$_GET["id"];
}

$get_pro = "select * from products WHERE product_id=$product_id";

$run_pro = mysqli_query($con,$get_pro);

$row_pro=mysqli_fetch_array($run_pro);

$pro_id = $row_pro['product_id'];

$pro_title = $row_pro['product_title'];

$pro_image = $row_pro['product_img1'];
$pro_image2 = $row_pro['product_img2'];
$pro_image3 = $row_pro['product_img3'];

$pro_price = $row_pro['product_price'];
$past_price=$row_pro['past_price'];
$pro_desc = $row_pro['product_desc'];



if (isset($_POST["add"])) {
	$id=$_POST["add_to_cart_id"];
    $ok = 1;
    if ($ok == 1) {
        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION["cart"], 'product_id');
          
            if (in_array($_POST['add_to_cart_id'], $items)) {
				// echo "<script>alert('Product has been inserted successfully')</script>";

               // header("location:product.php?id={$_POST['add_to_cart_id']}");
             
            } else {
                $item_array = array(
                    'product_id' => $_POST['add_to_cart_id'],
                    'product_price' => $_POST['product_price'],
                    'product_name' => $_POST['product_name'],
                    'product_image' => $_POST['product_image'],
					'quantity'=>1,
                   
                );
                $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
                header("location:product.php?id={$_POST['add_to_cart_id']}");
      
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
            header("location:product.php?id={$_POST['add_to_cart_id']}");
      
        }
    }
}else{
 
}



?>

<?php
if(isset($_POST['addcomm'])){
	$pro_id =$_POST['product_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment=$_POST['review'];
	
	
	$addreview="INSERT INTO comments(user_name,user_email,comment,product_id,approveal) 
	VALUES('$name','$email','$comment','$pro_id',0)";
mysqli_query($con,$addreview);
	

}?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>protection-product</title>

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
						<li ><a href="index.php">Home</a></li>
						<li><a href="#">About Us</a></li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
						<div class="product-preview">
								<img src="./admin_area/product_images/<?php echo $pro_image; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin_area/product_images/<?php echo $pro_image2; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin_area/product_images/<?php echo $pro_image3; ?>" alt="">
							</div>

							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./admin_area/product_images/<?php echo $pro_image; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./admin_area/product_images/<?php echo $pro_image2; ?>" alt="">
							</div>
							<div class="product-preview">
								<img src="./admin_area/product_images/<?php echo $pro_image3; ?>" alt="">
							</div>

						
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php  echo $pro_title; ?></h2><br>
							<div>
								<div class="product-rating">
									
								</div>
		
								
							</div>
							
<br>
							<div>
								<h3 class="product-price">$<?php echo $pro_price; ?><del class="product-old-price">$<?php echo $past_price;?></del></h3>
								<span class="product-available">In Stock</span>
							</div>
<br>
<br>
							<div class="add-to-cart">
								<div class="qty-label">
									
									<div class="input-number">
										<input type="hidden">
									
									</div>
								</div>
								
								<form action="" method="POST">
											<input type="hidden" name="add_to_cart_id" value="<?php echo $pro_id; ?>">
											<input type="hidden" name="product_name" value="<?php echo $pro_title; ?>">
											<input type="hidden" name="product_image" value="<?php echo $pro_image; ?>">
											<input type="hidden" name="product_price" value="<?php echo $pro_price; ?>">
											<button type="submit" name="add" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									
										</form>
							</div>
<br>
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
							<br>

							<ul class="product-links">
								
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							
								<li><a data-toggle="tab" href="#tab3">Reviews</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo  $pro_desc; ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

							

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
									
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
												<?php $comm = "SELECT * FROM comments where product_id='$product_id' AND approveal=1";
						                           	$con->query($comm);
							                      if ($res= $con->query($comm)) {
							                         while($comm_row = $res->fetch_assoc() ){?>
													<li>
														<div class="review-heading">
															<h5 class="name"><?php echo $comm_row['user_name'];?></h5>
															<p class="date"><?php echo $comm_row['date'];?></p>
															<div class="review-rating">
																
															</div>
														</div>
														<div class="review-body">
															<p><?php echo $comm_row['comment'];?></p>
														</div>
													</li>
													<?php }} ?>
													
												</ul>
												<ul class="reviews-pagination">
													
													
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method="post" action="">
												<input class="input" type="hidden" placeholder="Your Name" name="product_id" value="<?php echo $product_id;?>">
													<input class="input" type="text" placeholder="Your Name" name="name" required>
													<input class="input" type="email" placeholder="Your Email" name="email" required>
													<textarea class="input" placeholder="Your Review" name="review" required></textarea>
													<div class="input-rating">
														
													</div>
													<button class="primary-btn" type="submit" name="addcomm">add review</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

							<div class="products-tabs"> <h2>&nbsp; HOT DEALS</h2>
								
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
								
									<div class="products-slick" data-nav="#slick-nav-2">
									
										<?php  
							$query = "SELECT * FROM products where product_keywords='deal'";
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
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
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
							  
						 
				
				

					
					 -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		
		<!-- NEWSLETTER -->
		

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
