<?php
session_start();

include('connect.php');

if(empty( $_SESSION['uid']))
{
  header('location:index.php');           //default page to be opened when session is closed 
}

error_reporting(0);

$id = $_GET['id'];
mysqli_query($con,"DELETE FROM upload WHERE id = '".$id."' ");


?>



<!DOCTYPE html>
<html>
<head>
	<title>User Upload List Page</title>
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
			<span class="glyphicon glyphicon-list"></span>
			UPLOAD LIST PAGE
		</div>

	<!--Top Section End  -->


	<!-- Upload List Start -->

	<div class="row">

		<div class="col-sm-3">

			<input type="text" class="form-control" id="myInput" placeholder="Filter Here.." autofocus>

			<script>
				$(document).ready(function(){
  				$("#myInput").on("keyup", function() {
    			var value = $(this).val().toLowerCase();
   				$("#myTable tr").filter(function() {
      			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    			});
  				});
				});
			</script>
			
		</div>
		
		<div class="col-sm-7">
			
		</div>

		<div class="col-sm-2">

			<a title="Print Data Sheet" class="btn btn-danger" href="">
				<span class="glyphicon glyphicon-print"></span>
				Print
			</a>

		</div>

	</div>
	<br>


	<div class="table-responsive">
		
	<table class="table table-bordered table-hover table-strip">

		<thead>
			<tr>
				<th>Upload Id</th>
				<th>Upload Date</th>
				<th>User Id</th>
				<th>Name</th>
				<th>Title</th>
				<th>Description</th>
				<th>File/Document</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody id="myTable">

			<?php
			$sql = mysqli_query($con,"SELECT * FROM upload WHERE uid = '".$_SESSION['uid']."'");

			while($result= mysqli_fetch_assoc($sql))
			{
			
			?>

			<tr>
				<td><?php echo $result['id'] ?></td>
				<td><?php echo $result['udate'] ?></td>
				<td><?php echo $result['uid'] ?></td>
				<td><?php echo $result['uname'] ?></td>
				<td><?php echo $result['title'] ?></td>
				<td><?php echo $result['description'] ?></td>

				
				<td>
					<a href="<?php echo 'images/'.$result['docs'] ?>" target="blank">          <!--  path of the file uploaded -->
					<?php echo $result['docs'] ?>
					</a>	
				</td>
				
				<td>
					<a onclick="return confirm('Are you sure to delete this record??')" href="upload.php?id=<?php echo $result['id']?>">    <!-- for getting the id of row to be deleted -->
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

</body>
</html>