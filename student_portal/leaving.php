<?php
session_start();

include('connect.php');

if(empty( $_SESSION['uid']))
{
  header('location:index.php');           //default page to be opened when session is closed by default index page will run 
}

if(isset($_POST['btn']))
{
 $ldate = date('Y-m-d');
 $uid = $_SESSION['uid'];
 $uname = $_SESSION['uname'];
 $subject = $_POST['subject'];
 $description = $_POST['description'];

  mysqli_query($con,"INSERT INTO leaving (`ldate`,`uid`,`uname`,`subject`,`description`) VALUES ('$ldate','$uid','$uname','$subject','$description')");


  echo "<script>
alert('Application Sent Successfully..!');
window.location.href='leaving.php';
</script>";
}


error_reporting(0);

$id = $_GET['id'];
mysqli_query($con,"DELETE FROM leaving WHERE id = '".$id."' ");

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Leaving Form Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		.table-bordered thead tr th{background-color: skyblue;}
	</style>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

<!-- Top Section Start -->

		<div class="well well-sm">
			<span class="glyphicon glyphicon-edit"></span>
			LEAVING FORM PAGE
		</div>

<!--Top Section End  -->

<!-- Form Section Start -->

		<div class="row">

			<div class="col-sm-5">

				<form method="post" enctype="multipart/form-data">

					<div class="panel panel-default">

						<div class="panel-heading">
							<h3>Upload New Application</h3>
						</div>

						<div class="panel-body">
							
							<label>Subject</label>
							<input type="text" name="subject" class="form-control" required>
							<br>

							<label>Description</label>
							<textarea rows="4" name="description" class="form-control" required></textarea>
							<br>

						</div>

						<div class="panel-footer">
							<button type="submit" name="btn" class="btn btn-primary btn-block">Send Application</button>
						</div>
						
					</div>

				</form>
				
			</div>

			<div class="col-sm-7">
				<h4>Application List:-</h4>

				<div class="table-responsive">
		
	<table class="table table-bordered table-hover table-strip">

		<thead>
			<tr>
				<th>Upload Id</th>
				<th>Upload Date</th>
				<th>User Id</th>
				<th>Name</th>
				<th>Subject</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody id="myTable">

			<?php
			$sql = mysqli_query($con,"SELECT * FROM leaving WHERE uid = '".$_SESSION['uid']."'");

			while($result= mysqli_fetch_assoc($sql))
			{
			
			?>

			<tr>
				<td><?php echo $result['id'] ?></td>
				<td><?php echo $result['ldate'] ?></td>
				<td><?php echo $result['uid'] ?></td>
				<td><?php echo $result['uname'] ?></td>
				<td><?php echo $result['subject'] ?></td>
				<td><?php echo $result['description'] ?></td>
				
				<td>
					<a onclick="return confirm('Are you sure to delete this record??')" href="leaving.php?id=<?php echo $result['id']?>">    <!-- for getting the id of row to be deleted -->
						<span class="glyphicon glyphicon-trash"></span>
						Delete
					</a>
				</td>


			</tr>

		<?php } ?>

		</tbody>
	
	</table>

	</div>


	<!-- Upload List End -->

			</div>
			
		</div>

	<!-- Form Section End -->

	</div>

</body>
</html>