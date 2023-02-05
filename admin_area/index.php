<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

    header("Location:http://localhost/Security-Store//dashboard/login.php");

}

else {




?>

<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admin  where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];






$get_products = "SELECT * FROM products";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);


$get_customers = "SELECT * FROM users";
$run_customers = mysqli_query($con,$get_customers);
$count_customers = mysqli_num_rows($run_customers);



$get_total_orders = "SELECT * FROM orders";
$run_total_orders = mysqli_query($con,$get_total_orders);
$count_total_orders = mysqli_num_rows($run_total_orders);


$get_coupons = "SELECT * FROM coupons";
$run_coupons = mysqli_query($con,$get_coupons);
$count_coupons = mysqli_num_rows($run_coupons);


?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >


</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['insert_product'])){

include("insert_product.php");

}

if(isset($_GET['view_products'])){

include("view_products.php");

}

if(isset($_GET['delete_product'])){

include("delete_product.php");

}

if(isset($_GET['edit_product'])){

include("edit_product.php");

}


if(isset($_GET['view_p_cats'])){

include("view_p_cats.php");

}



if(isset($_GET['insert_cat'])){

include("insert_cat.php");

}

if(isset($_GET['view_cats'])){

include("view_cats.php");

}

if(isset($_GET['delete_cat'])){

include("delete_cat.php");

}

if(isset($_GET['edit_cat'])){

include("edit_cat.php");

}



if(isset($_GET['view_customers'])){

include("view_customers.php");

}

if(isset($_GET['customer_delete'])){

include("customer_delete.php");

}


if(isset($_GET['view_orders'])){

include("view_orders.php");

}

if(isset($_GET['order_delete'])){

include("order_delete.php");

}



if(isset($_GET['view_massege'])){

    include("view_massege.php");
    
    }
    
    if(isset($_GET['delete_message'])){
    
    include("delete_message.php");
    
    }


if(isset($_GET['insert_user'])){

include("insert_user.php");

}

if(isset($_GET['view_users'])){

include("view_users.php");

}


if(isset($_GET['user_delete'])){

include("user_delete.php");

}



if(isset($_GET['user_profile'])){

include("user_profile.php");

}

if(isset($_GET['insert_box'])){

include("insert_box.php");

}

if(isset($_GET['view_boxes'])){

include("view_boxes.php");

}

if(isset($_GET['delete_box'])){

include("delete_box.php");

}

if(isset($_GET['edit_box'])){

include("edit_box.php");

}



if(isset($_GET['edit_css'])){

include("edit_css.php");

}
if(isset($_GET['view_done_comment'])){
    
    include("view_done_comment.php");
        
    }


if(isset($_GET['view_comment'])){
    
    include("view_comment.php");
        
    }

if(isset($_GET['approve_comm'])){

    include("approve_comm.php");
    
    }


if(isset($_GET['delete_comment'])){
    
 include("delete_comment.php");
    
 }
    







if(isset($_GET['edit_coupon'])){

include("edit_coupon.php");

}


if(isset($_GET['insert_icon'])){

include("insert_icon.php");

}


if(isset($_GET['view_icons'])){

include("view_icons.php");

}

if(isset($_GET['delete_icon'])){

include("delete_icon.php");

}

if(isset($_GET['edit_icon'])){

include("edit_icon.php");

}





?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php } ?>