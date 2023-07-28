<?php
session_start();

include('../connect.php');

if (!empty($_SESSION['admin']))

{
	header('location:home.php');
}

if (isset($_POST['login'])) 
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	

	if($user == 'Admin' && $pass == 'admin123')
	{
		$_SESSION['admin'] = $user;

		header('location:home.php');
	}
	else
	{
		echo "<script>
		alert('Invalid Entry!..');

		window.location.href='index.php';
		</script>";
	}
	
}
?>


<!DOCTYPE html>
<html>
<head>

	<title>Admin Login Page</title>

	<?php echo include('../bootcdn.php');   ?>

</head>
<body>

	<div class="container">
		<br><br><br><br><br><br>
        
        <!-- to create row -->
		<div class="col-sm-4">
			
		</div>
		
		<div class="col-sm-4">
			 <!-- login form start -->

			 <div class="panel panel-default">
			 	<!-- heading section -->
			 	<div class="panel-heading">

			 		<h3>Admin Login Page</h3>
			 		
			 	</div>

			 	<form method="post">
                 
                 <!-- body section -->
			 	<div class="panel-body">
			 		<span class="glyphicon glyphicon-user"></span>
			 		<label>Username</label>
			 		<input type="text" name="user" class="form-control" placeholder="Enter Name" autofocus>
			 		<br>
                     
                    <span class="glyphicon glyphicon-lock"></span> 
			 		<label>Password</label>
			 		<input type="password" name="pass" class="form-control" placeholder="Enter Password" autofocus>
			 		
			 	</div>
                 <!-- footer section -->
			 	<div class="panel-footer">
			 		<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
			 	</form>
			 		<br>

			 		<p>
			 			Go to
			 		<a href="../">
			 			Student panel></a>
			 	   </p>
			 		
			 	</div>
			 	
			 	
			 	
			 </div>

			 <!-- login form end -->
		</div>
		

	</div>

</body>
</html>
