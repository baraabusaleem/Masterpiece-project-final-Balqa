<?php

if(!isset($_SESSION['admin_email'])){

    header("Location:http://localhost/Security-Store//dashboard/login.php");
}

else {








    if(isset($_GET['approve_comm'])){

     $c_id=$_GET['approve_comm'];
$update_cat = "update comments set 	approveal='1' where comment_id='$c_id'";

$run_cat = mysqli_query($con,$update_cat);

if($run_cat){

//echo "<script>alert('One Category Has Been Updated')</script>";

echo "<script>window.open('index.php?view_comment','_self')</script>";

}

        
        
        }
        











?>

<?php } ?>