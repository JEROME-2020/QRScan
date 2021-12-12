<?php 

	include("connection.php");
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "DELETE FROM employee_record WHERE Emp_Id = $id";
		mysqli_query($conn, $sql) or die("Error Deleting: " . mysqli_error($conn));
		header("location: EmployeeRecord.php");
	
	}
 ?>