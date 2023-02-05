<?php

session_start();

include './admin_area/includes/db.php';

print_r($_SESSION['cart']);
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    //require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                // $total = 0;
                //     if (isset($_SESSION['cart'])){
                //         $product_id = array_column($_SESSION['cart'], 'product_id');

                //         $result = $con->getData();
                //         while ($row = mysqli_fetch_assoc($result)){
                //             foreach ($product_id as $id){
                //                 if ($row['id'] == $id){
                //                     cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                //                     $total = $total + (int)$row['product_price'];
                //                 }
                //             }
                //         }
                //     }else{
                //         echo "<h5>Cart is Empty</h5>";
                //     }
$total=0;
                if (isset($_SESSION["cart"])) {
                    foreach ($_SESSION['cart'] as $key => $value) { ?>
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="./admin_area/product/product_images/<?php echo $value['product_image']; ?>" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2"><?php echo $value['product_name'] ; ?></td>
                            <td class="column-3">$ <?php echo $value['product_price']; ?></td>
                            <td class="column-4">
                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>
                                    <input class="mtext-104 cl3 txt-center num-product" type="number" min="1" name="<?php echo $value['product_id'] ; ?>">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="column-5"> $ <?php $total += $value['product_price'] ;
                                echo $value['product_price'] ; ?><a href="cart.php?delete=<?php echo $value['product_id']  ?>"><button class="ml-4" type="button" name="<?php echo "removeItem" . $value['product_id']  ?>"><i style="display: block;" class="far fa-trash-alt fa-lg"></i></button></a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo'<div class="text-center h2 mb-5">no item in cart</div>';
                }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>