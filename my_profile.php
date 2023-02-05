  <?php
  include './admin_area/includes/db.php';
   session_start();
$image="";
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
   rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link href="./css/style_profile.css" rel="stylesheet">

   <title>profile</title>
</head>

<body>
<?php
  
  if(isset($_SESSION['user_id']))
  {
      $user_id = mysqli_real_escape_string($con, $_SESSION['user_id']);
      $query = "SELECT * FROM users WHERE user_id='$user_id' ";
      $query_run = mysqli_query($con, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          $user = mysqli_fetch_array($query_run);
          ?>
<div class="container mt-5">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">


					
                  
				</div>
				<h5 class="user-name">Welcome</h5>
			
				<h5 class="user-name"><?php echo $user['user_name'];?></h5>
				<h6 class="user-name"><?php echo $user['user_email'];?></h6>
            
              
			</div>
			
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
   
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <input type="hidden" class="form-control" name="user_id" id="fullName" placeholder="Enter full name" value=<?php echo  $user['user_id'];  ?>>
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" name="user_name" id="fullName" placeholder="Enter full name" value=<?php echo  $user['user_name'];  ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" name="email" id="eMail" placeholder="Enter email ID" value=<?php echo  $user['user_email'];  ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" value=<?php echo  $user['user_phone'];  ?>>
				</div>
			</div>
			
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Address</label>
					<input type="name" class="form-control" name="address" id="Street" placeholder="Enter Street" value=<?php echo  $user['user_address'];  ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Country</label>
					<input type="name" class="form-control" name="country" id="ciTy" placeholder="Enter City" value=<?php echo  $user['user_country'];  ?>>
				</div>
			</div>
			
			
		</div><br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="submit" id="submit" name="cancel" class="btn btn-secondary">Cancel</button>
					<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
      
</div>

</div>
</div>
</body>
</html>

<?php }}?>


<?php
$sub="";
if(isset($_POST['submit'])){

 $user_name=$_POST ['user_name'];
 $user_email=$_POST['email'];
 $user_country=$_POST['country'];
 $user_address=$_POST['address'];
 $id=$_POST['user_id'];
 $user_phone=$_POST['phone'];


//  if(empty($_POST['image'])){
//    $image="default.jpg";
// }  else{

//}

$sql="UPDATE users set  user_name='$user_name', user_email='$user_email', user_country='$user_country' ,user_address='$user_address' , user_phone='$user_phone' where user_id='$id'";

$result=mysqli_query($con,$sql);
if($result){

 $sub="updated done";
}


}
elseif(isset($_POST['cancel'])){
header('location: index.php');

}
?>