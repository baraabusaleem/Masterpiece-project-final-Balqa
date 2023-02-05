<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Coupon

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> Insert Coupon

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!--panel-body Starts -->

<form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Coupon Title </label>

<div class="col-md-6">

<input type="text" name="coupon_title" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Coupon Price </label>

<div class="col-md-6">

<input type="text" name="coupon_price" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Coupon Code </label>

<div class="col-md-6">

<input type="text" name="coupon_code" class="form-control">

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="submit" class=" btn btn-primary form-control" value=" Insert Coupon ">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!--panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --->

<?php

if(isset($_POST['submit'])){

$coupon_title = $_POST['coupon_title'];

$coupon_price = $_POST['coupon_price'];

$coupon_code = $_POST['coupon_code'];



$insert_coupon = "insert into coupons (coupon_title,coupon_price,coupon_code) values ('$coupon_title','$coupon_price','$coupon_code')";

$run_coupon = mysqli_query($con,$insert_coupon);

if($run_coupon){

echo "<script>alert('New Coupon Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_coupons','_self')</script>";

}


}

?>

<?php } ?>