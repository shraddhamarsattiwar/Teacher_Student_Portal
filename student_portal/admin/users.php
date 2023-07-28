<?php
session_start();
include('../connect.php');
if (empty($_SESSION['admin']))

{
	header('location:index.php');
}

error_reporting(0);

$id = $_GET['id'];
mysqli_query($con,"DELETE FROM students WHERE id = '".$id."' ");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users List Page </title>
	<?php include('../bootcdn.php')?>

	<style type="text/css">
		.table-bordered thead tr th {background-color: lightblue;}
	</style>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

        <!-- top section start -->
		<div class="well well-sm">
			<span class="glyphicon glyphicon-user"></span>
			USER'S DATA LIST PAGE
			
		</div>
		<!-- top section end -->

        <!-- upload list start -->
         <div class="row">

         	<div class="col-sm-3">
         		<input type="text"class="form-control"id="myInput"placeholder="Filter here..."autofocus>
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
         		<a title="Print Data Sheet"class="btn btn-danger"href="">
         			<span class="glyphicon glyphicon-print"></span>
         			Print
         		</a>
         		
         	</div>
         		
         	</div>
         	<br>
            
            <h4>Search by date:</h4>
         	<div class="table-responsiv">

         		<table class="table table-bordered table-hover table-striped">
         			<thead>
         				<tr>
         					<th>Reg Id</th>
         					<th>Reg Date</th>
         					<th>Student Name</th>
         					<th>Contact No</th>
         					<th>Branch</th>
         					<th>Address</th>
         					<th>Photo</th>
         					<th>Action</th>
         				</tr>
         			</thead>

         			<tbody id ="myTable">
         				<?php
                         
                         $sql = mysqli_query($con,"SELECT * FROM students ORDER BY id desc");
                         while ($result = mysqli_fetch_assoc($sql)) 
                         {
                         ?>

                         <tr>
                         	<td><?php echo $result['id']  ?></td>
                         	<td><?php echo $result['rdate']  ?></td>
                         	<td><?php echo $result['sname']  ?></td>
                         	<td><?php echo $result['contact']  ?></td>
                         	<td><?php echo $result['branch']  ?></td>
                         	<td><?php echo $result['address']  ?></td>

                         	<td>
                         		<a href="<?php echo '../images/'.$result['photo']  ?>" target = "blank">
                         		<?php echo $result['photo']  ?>
                         	   </a>  
                         			
                         	</td>

                         	<td>
                         		<a onclick="return confirm('Are you sure?')" href="users.php?id=<?php echo $result['id']  ?>">
                         			<span class="glyphicon glyphicon-trash"> Delete</span>
                         		</a>
                         	</td>

                         </tr>

                       <?php } ?>

         			</tbody>
         			
         		</table>
         		
         	</div>
         	
         </div>


        <!-- upload list end -->



	</div>

</body>
</html>