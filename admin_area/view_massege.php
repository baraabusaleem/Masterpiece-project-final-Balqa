<?php


if(!isset($_SESSION['admin_email'])){
        header("Location:http://localhost/Security-Store//dashboard/login.php");

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Message

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

        View Message

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>


<th>#</th>
<th>Person name</th>
<th>Person email</th>
<th>Person phone</th>
<th>message</th>
<th>Action</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php



$get_msg = "select * from contact_us";

$run_msg = mysqli_query($con,$get_msg);

while ($row_msg = mysqli_fetch_array($run_msg)) {

$msg_id = $row_msg['massege_id'];

$user_name = $row_msg['user_name'];
$user_email=$row_msg['user_email'];
$user_phone=$row_msg['user_phone'];
$user_msg=$row_msg['message_user'];




?>


<tr>


<td><?php echo $msg_id ?></td>
<td><?php echo $user_name ?></td>
<td><?php echo $user_email ?></td>
<td><?php echo $user_phone ?></td>
<td><?php echo $user_msg ?></td>

<td>

<a href="index.php?delete_message=<?php echo $msg_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>