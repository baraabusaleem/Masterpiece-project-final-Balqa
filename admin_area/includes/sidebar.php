<?php


if(!isset($_SESSION['admin_email'])){

header("Location:http://localhost/Security-Store//dashboard/login.php");

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->




<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="http://localhost/Security-Store//index.php">

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>  Website 

</a>

</li>



<li><!-- li Starts -->

<a href="#" data-toggle="" data-target="#cat">

<i class="fa fa-fw fa-arrows-v"></i> Categories

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="cat" class="">
<li>
<a href="index.php?view_cats"> View Categories </a>
</li>
<li>
<a href="index.php?insert_cat"> Insert Category </a>
</li>






</ul>

</li><!-- Products li Ends -->


<li><!-- Products li Starts -->

<a href="#" data-toggle="" data-target="#products">

<i class="fa fa-fw fa-table"></i> Products

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="products" class="">
<li>
<a href="index.php?view_products"> View Products </a>
</li>
<li>
<a href="index.php?insert_product"> Insert Products </a>
</li>



</ul>






</li><!-- li Ends -->


<!--<li>--><!-- Coupons Section li Starts -->

<!--<a href="#" data-toggle="collapse" data-target="#coupons">--><!-- anchor Starts -->

<!--<i class="fa fa-fw fa-arrows-v"></i> Coupons

<i class="fa fa-fw fa-caret-down"></i>

</a>--><!-- anchor Ends -->

<!--<ul id="coupons" class="">--><!-- ul collapse Starts -->
<!--
<li>
<a href="index.php?insert_coupon"> Insert Coupon </a>
</li>

<li>
<a href="index.php?view_coupons"> View Coupons </a>
</li>

</ul>--><!-- ul collapse Ends -->

<!--</li>--><!--Coupons Section li Ends -->

<li>

<a href="index.php?view_orders">

<i class="fa fa-fw fa-list"></i> View Orders

</a>

</li>

<li>

<a href="index.php?view_comment">

<i class="fa fa-fw fa-list"></i> View new Comments

</a>

</li>

<li>

<a href="index.php?view_done_comment">

<i class="fa fa-fw fa-list"></i> approveal Comments

</a>

</li>

<li>

<a href="index.php?view_massege">

<i class="fa fa-fw fa-list"></i> View Message

</a>

</li>

<li>

<a href="index.php?view_customers">

<i class="fa fa-fw fa-edit"></i> View Customers

</a>

</li>







<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-fw fa-gear"></i> Admin

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="">

<!-- <li>
<a href="index.php?insert_user"> Insert User </a>
</li>

<li>
<a href="index.php?view_users"> View Users </a>
</li> -->

<li>
<a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Profile </a>
</li>

</ul>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>