<?php

include('connect.php');

if(isset($_POST['reg']))
{
	$rdate= date('Y-m-d');
	$sname= $_POST['sname'];
	$contact= $_POST['contact'];
	$branch= $_POST['branch'];
	$address= $_POST['address'];
	$photo = $_FILES['photo']['name'];
	$pass = $_POST['pass'];

	mysqli_query($con, "INSERT INTO students(`rdate`,`sname`,`contact`,`branch`,`address`,`photo`,`pass`) VALUES ('$rdate','$sname','$contact','$branch','$address','$photo','$pass') ");

	$dir = "images/";
	$photo = $_FILES['photo']['name'];
	$tmp_photo = $_FILES['photo']['tmp_name'];

	move_uploaded_file($tmp_photo,$dir.$photo);


	echo "<script>
	alert('Registration Successful....');
	window.location.href= 'index.php';
	</script>";                                                                                                     																							   
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Student Sign Up Form</title>
	<?php include('bootcdn.php'); ?>

</head>
<body> 

	<div class="container">
		<br><br><br><br><br>

		<div class="row">

			<div class="col-sm-3">
				
			</div>

			<div class="col-sm-6">

				<!-- Sign Up form start -->

				<form method="post" enctype="multipart/form-data">

					<div class="panel panel-default">

						<div class="panel-heading">
							<h3>Student Registration Form</h3>
						</div>

						<div class="panel-body">

							<form>
								<label>Student Name</label>
								<input type="text" name="sname" class="form-control" required>
								<br>

								<label>Contact Number</label>
								<input type="number" name="contact" class="form-control" required>
								<br>

								<label>Branch</label>
								<select name="branch" class="form-control" required>
									<option value="">--Select Branch</option>
									<option>Information Technology</option>
									<option>Computer Technology</option>
									<option>Computer Science & Technology</option>
									<option>Mechanical Engineering</option>
									<option>Electrical Engineering</option>
								</select>
								<br>

								<label>Address</label>
								<textarea name="address" class="form-control" required></textarea>
								<br>

								<label>Upload Photo</label>
								<input type="file" name="photo" class="form-control" required>
								<br>

								<label>Set Password</label>
								<input type="text" name="pass" class="form-control" required>

							</form>
							
						</div>

						<div class="panel-footer">
							<button type="submit" name="reg" class="btn btn-primary">Sign Up</button>
							<button type="reset" class="btn btn-danger">Reset</button>
							<br><br> 

							<p>Go to 
								<a href="index.php">Login Page</a>
							</p>
							
						</div>
						
					</div>
					
				</form>

				<!-- Sign Up form end -->
				
			</div>
			
		</div>

		
	</div>

</body>
</html>