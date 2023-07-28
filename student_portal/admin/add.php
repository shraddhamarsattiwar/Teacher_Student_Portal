<?php
session_start();

include('../connect.php');

if(empty( $_SESSION['admin']))
{ 
  header('location:index.php');           //default page to be opened when session is closed or logout
}

if(isset($_POST['add']))
{
 $ndate = date('Y-m-d');
 $msg = $_POST['msg'];

 mysqli_query($con,"INSERT INTO notification (`ndate`,`msg`) VALUES ('$ndate','$msg')");

echo "<script>
alert('Broadcast New Notification..!');
window.location.href='add.php';
</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Notification Page</title>
	<?php include('../bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

	<!-- Top Section Start -->

		<div class="well well-sm">
			<span class="glyphicon glyphicon-bullhorn"></span>
			ADD NEW NOTIFICATION PAGE
		</div>

	<!--Top Section End  -->


	<!-- Form Section Start -->

		<div class="row">

			<div class="col-sm-6">

				<form method="post" enctype="multipart/form-data">

					<div class="panel panel-default">

						<div class="panel-heading">
							<h3>Upload New Notification</h3>
						</div>

						<div class="panel-body">

							<label>Add New Notification</label>
							<textarea rows="4" name="msg" class="form-control" required></textarea>
							<br>

						</div>

						<div class="panel-footer">
							<button type="submit" name="add" class="btn btn-primary btn-block">Send Notification</button>
						</div>
						
					</div>

				</form>
				
			</div>
			
		</div>

	<!-- Form Section End -->

	</div>

</body>
</html>