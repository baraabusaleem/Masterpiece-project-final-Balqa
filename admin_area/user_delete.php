<?php

if(!isset($_SESSION['admin_email'])){

    header("Location:http://localhost/Security-Store//dashboard/login.php");

}

else {


?>

<?php

if(isset($_GET['user_delete'])){

$delete_id = $_GET['user_delete'];

$delete_user = "delete from admins where admin_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_user);

if($run_delete){

//echo "<script>alert('One User Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";

}


}


?>

<?php } ?>