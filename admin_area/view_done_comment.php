<?php



if(!isset($_SESSION['admin_email'])){

    header("Location:http://localhost/Security-Store//dashboard/login.php");

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View approveal Comments

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> View approveal Comments

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th> Name</th>
<th>E-mail</th>
<th>Comment</th>
<th> Comment date</th>
<th>delete</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php 



$get_cats = "select * from comments where approveal='1'";

$run_cats = mysqli_query($con,$get_cats);

while($row_cats = mysqli_fetch_array($run_cats)){

$comm_id = $row_cats['comment_id'];

$comm = $row_cats['comment'];
$comm_user = $row_cats['user_name'];
$comm_email = $row_cats['user_email'];
$comm_date=$row_cats['date'];
$aprov=$row_cats['approveal'];






?>

<tr>

<td><?php echo $comm_id; ?></td>
<td><?php echo $comm_user; ?></td>
<td><?php echo $comm_email; ?></td>
<td><?php echo $comm; ?></td>
<td><?php echo $comm_date; ?></td>


<td>

<a href="index.php?delete_comment=<?php echo $comm_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>


<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table-bordered table-hover table-striped Ends -->


</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>