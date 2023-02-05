<?php
//include './admin_area/includes/db.php';
session_start();
if (isset($_POST["add"])) {
    $ok = 1;
    if ($ok == 1) {
        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION["cart"], 'product_id');
          
            if (in_array($_POST['add_to_cart_id'], $items)) {
                $_SESSION["cart"][$_POST['add_to_cart_id']  . $_POST['quantity']] += $_POST['num-product'];
                header("location:store.php?id={$_GET['id']}");
                echo "1111111111";
            } else {
                $item_array = array(
                    'product_id' => $_POST['add_to_cart_id'],
                    'product_price' => $_POST['product_price'],
                    'quantity' => $_POST['num-product'],
                    'product_name' => $_POST['product_name'],
                    'product_image' => $_POST['product_image'],
                   
                );
                $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
                header("location:store.php?id={$_GET['id']}");
                echo "1112222222222222222";
            }
        } else {
            $item_array = array(
                'product_id' => $_POST['add_to_cart_id'],
                'product_price' => $_POST['product_price'],
                'quantity' => $_POST['num-product'],
                'product_name' => $_POST['product_name'],
                'product_image' => $_POST['product_image'],
               
            );
            $_SESSION["cart"][$_POST['add_to_cart_id'] ] = $item_array;
            header("location:store.php}");
            echo "111111113333333333333333333311";
        }
    }
}else{
    echo "11111111333344444444444444444444444444333333333333333311";
}

?>