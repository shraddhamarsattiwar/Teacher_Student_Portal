<?php
session_start();
include('connect.php');

if(!empty( $_SESSION['uid']))
{
  header('location:home.php');           //default page to be opened when session is not closed or logout
}

if(isset($_POST['login']))
{
 $user = $_POST['user'];
 $pass = $_POST['pass'];

 $sdata = mysqli_query($con,"SELECT * FROM students WHERE `contact`= '".$user."' AND `pass`= '".$pass."' ");

 $result = mysqli_num_rows($sdata);

while($abc = mysqli_fetch_assoc($sdata))
{
  $_SESSION['uid'] = $abc['id'];
  $_SESSION['uname'] = $abc['sname'];
}


 if($result>0)
 {
   //echo "Login Successful";
  header('location:home.php');    //landing page location                      
 }
  else
  {
  echo "<script>
   alert('Invalid UserID or Password');
   window.location.href='index.php';
   </script>";
  }

}  

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student LogIn Page</title>

	<?php include('bootcdn.php'); ?>
</head>
<body>
	<div class="container">

		<br><br><br><br><br><br>

		<div class="row">

			<div class="col-sm-4">
				
			</div>

			<div class="col-sm-4">

				<!-- Login form start -->
        <form method="post">
				<div class="panel panel-default">
					
                  <div class="panel-heading">
                  	<h3>Student Login Page</h3>
                  </div>

                  <div class="panel-body">
                  	<label>Username</label>
                  	<input type="text" name="user" class="form-control">
                    <br>

                    <label>Password</label>
                    <input type="password" name="pass" class="form-control">

                  </div>

                  <div class="panel-footer">
                  	<button type="submit" name="login" class="btn btn-primary btn-block">LogIn</button>
                  	<br>
                  	<p>
                  		Not registered click 
                  		<a href="signup.php">Sign Up</a>
                  	</p>

                  	<p>
                  		Go to
                  		<a href="admin/">Admin Panel</a>    <!-- to call index page from admin folder -->
                  	</p>

                  </div>

				</div>
        </form>
				<!-- Login form end -->

			</div>
			
		</div>
		
	</div>

</body>
</html>