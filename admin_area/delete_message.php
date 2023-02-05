

<?php


if(!isset($_SESSION['admin_email'])){

    header("Location:http://localhost/Security-Store//dashboard/login.php");
}

else {


if(isset($_POST['id'])){


if(isset($_GET['delete_message'])){

$delete_id = $_GET['delete_message'];

$delete_cat = "delete from contact_us where massege_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_cat);

if($run_delete){

//echo "<script> alert('One Category Has Been Deleted') </script>";

echo "<script>window.open('index.php?view_massege','_self')</script>";

}

}
}}



?>

   <div class="wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <h2 class="mt-5 mb-3">Delete Record</h2>
                   <form action="" method="post">
                       <div class="alert alert-danger">
                           <input type="hidden" name="id" value="<?php echo trim($_GET["delete_message"]); ?>"/>
                           <p>Are you sure you want to delete this record?</p>
                           <p>
                               <input type="submit" value="Yes" class="btn btn-danger">
                               <a href="index.php?view_massege" class="btn btn-secondary">No</a>
                           </p>
                       </div>
                   </form>
               </div>
           </div>        
       </div>
   </div>

