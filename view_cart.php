<?php
  include './admin_area/includes/db.php';
   session_start();
 
   if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key == $del) {
                unset($_SESSION['cart'][$key]);
                header("location:view_cart.php");
            }
        }
    }}

  
        if (isset($_SESSION['cart'])) {
            if (isset($_POST['update'])) {
                foreach ($_SESSION['cart'] as $keys => $value) {
                  $ids= $_POST['id'];
                    foreach ($_POST as $key => $value) {
                        if (isset($_POST['quantity'])) {

                            $_SESSION['cart'][$ids]['quantity'] = $_POST['quantity'];
                            header("location:view_cart.php");
                        }
                    }
                }
            }

            }
   ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>shopping cart - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey mt-5">
    <div class=" col-lg-12 col-md-12 col-sm-8 content">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">Cart</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger panel-shadow">
                    <div class="panel-heading">
                        <h3>
                           
                           YOUR CART:
                        </h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
             
                        <table class="table">
                            <thead>
                            <?php $total=0;
                            $totalpro=0;
                         
                          
                            
                if (isset($_SESSION["cart"]) && count($_SESSION["cart"])!=0) {
                    foreach ($_SESSION['cart'] as $key => $value) { 
                    
                        ?>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                          
                            <tbody>
                 
                        
                                <tr>
                                    <td><img src="./admin_area/product_images/<?php echo $value['product_image']; ?>" class="img-cart"></td>
                                    <td><?php echo $value['product_name'] ; ?></td>
                                    <td>
                                    <form class="form-inline" method="POST" action="">
                                        <input class="form-control" type="number" value="<?php echo $value['quantity']; ?>" name="quantity" >
                                        <input class="form-control" type="hidden" value="<?php echo $value['product_id'] ?>" name="id" >
                                        <button rel="tooltip" type="submit" name="update" class="btn btn-success">save</button>
                                        <a href="view_cart.php?delete=<?php echo $value['product_id']  ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </form>
                                    </td>
                                    <td> <?php echo $value['product_price']; ?></td>
                                    <td><?php echo $value['product_price']* $value['quantity'] ; 

                                    
                                     $totalpro+=$value['product_price']* $value['quantity'];?></td>
                                </tr>
                               <?php }?>
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                              
                                <tr>
                                    <td colspan="4" class="text-right">Total Shipping</td>
                                    <?php $shipping=10; ?>
                                    <td><?php echo $shipping; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total</strong></td>
                                    <td>  <?php echo $total = $totalpro+$shipping;?></td>
                                </tr>
                                <?php  
                } else {
                    echo'<div class="text-center h2 mb-5">no item in cart</div>';
                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <a href="index.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
                <a href="checkout.php?total=<?php echo $total ?>"  class="btn btn-primary pull-right">checkout<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.img-cart {
    display: block;
    max-width: 50px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
}
table tr td{
    border:1px solid #FFFFFF;    
}

table tr th {
    background:#eee;    
}

.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>
