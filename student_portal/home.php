<?php
session_start();
include('connect.php');
                                                                                                                                                                                               
if(empty( $_SESSION['uid']))
{
  header('location:index.php');           //default page to be opened when session is closed 
}
 
?>



<!DOCTYPE html>
<html>
<head>
	<title>User Home Page</title>
	<?php include('bootcdn.php') ?>

</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

<!-- Top Section Start -->

		<div class="well well-sm">
			<span class="glyphicon glyphicon-home"></span>
			HOME PAGE
		</div>

<!--Top Section End  -->

<!-- Content Section Start -->


	<div class="well">

		<h4> <span class="glyphicon glyphicon-bullhorn"></span>
		Notifications/News:-</h4>

		<?php
		$ndata = mysqli_query($con,"SELECT * FROM notification ORDER BY id desc ");
		$abc = mysqli_fetch_array($ndata);
		?>

		<i>
			Date:<?php echo $abc['ndate'] ?>
		</i>
		<br>

		<p>
			<b>Message:</b>
			<?php echo $abc['msg'] ?>
		</p>
		
	</div>


	<div class="row">
		
		<div class="col-sm-3">                                                                                                          

			<div class="well">

				<center>
					<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-list"></span>

					<?php
					$sql = mysqli_query($con, "SELECT * FROM upload WHERE uid = '".$_SESSION['uid']."' ");
					$result = mysqli_num_rows($sql);
					?>

					<h4>Total Uploads - <?php echo $result; ?></h4>
				</center>
				
			</div>
			
		</div>



		<div class="col-sm-3">

			<div class="well">

				<center>
					<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-time"></span>

					<?php
					$sql = mysqli_query($con, "SELECT * FROM upload WHERE udate = '".date('Y-m-d')."' AND uid = '".$_SESSION['uid']."' ");
					$result = mysqli_num_rows($sql);
					?>


					<h4>Today's Uploads- <?php echo $result; ?> </h4>
				</center>
				
			</div>
			
		</div>


		<div class="col-sm-3">

			<div class="well">

				<center>
					<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-edit"></span>

					<?php
					$sql = mysqli_query($con, "SELECT * FROM leaving WHERE uid = '".$_SESSION['uid']."' ");
					$result = mysqli_num_rows($sql);
					?>

					<h4>Applications - <?php echo $result; ?> </h4>
				</center>
				
			</div>
			
		</div>


		<div class="col-sm-3">

			<div class="well">

				<center>
					<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-time"></span>

					<?php
					$sql = mysqli_query($con, "SELECT * FROM leaving WHERE ldate = '".date('Y-m-d')."' AND uid = '".$_SESSION['uid']."' ");
					$result = mysqli_num_rows($sql);
					?>


					<h4>Today's Applications- <?php echo $result; ?> </h4>
				</center>
				
			</div>
			
		</div>



	</div>

<!-- Content Section End -->

	</div>

</body>
</html>