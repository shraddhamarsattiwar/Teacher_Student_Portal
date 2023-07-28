<?php
session_start();

include('../connect.php');
if (empty($_SESSION['admin']))

{
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Home Page </title>
	<?php include('../bootcdn.php')?>
</head>
<body>

	<?php include('header.php') ?>
	
	<div class="container">

        <!-- top section start -->
		<div class="well well-sm">
			<span class="glyphicon glyphicon-home"></span>
			HOME PAGE
			
		</div>
		<!-- top section end -->
		<!-- content section start  -->

        

        <div class="col-sm-3">
        	<div class="well">
        		<center>
        			<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-list"></span>

        			<?php 

        			$sql = mysqli_query($con,"SELECT * FROM upload ");
        			$result = mysqli_num_rows($sql);

                    ?>

        			<h4>Total Upload- <?php echo $result;  ?></h4>
        		</center>
        		
        	</div>
        	
        </div>
       

        <div class="col-sm-3">
        	<div class="well">
        		<center>
        			<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-time"></span>
        			<?php 

        			$sql = mysqli_query($con,"SELECT * FROM `upload` WHERE `udate` = '".date('Y-m-d')."'  ");
        			$result = mysqli_num_rows($sql);

                    ?>
        			<h4>Todays Upload- <?php echo $result; ?> </h4>
        		</center>
        		
        	</div>
        	
        </div>


         <div class="col-sm-3">
        	<div class="well">
        		<center>
        			<span style="font-size: 30px; color: steelblue;" class="glyphicon glyphicon-edit"></span>

        			<?php 

        			$sql = mysqli_query($con,"SELECT * FROM `leaving` ");
        			$result = mysqli_num_rows($sql);

                    ?>
        			
                    
        			<h4>Applications- <?php echo $result; ?> </h4>
        		</center>
        		
        	</div>
        	
        </div>
		<!-- content section end -->
	</div>

</body>
</html>