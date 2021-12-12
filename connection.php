<?php 

	$localhost = "localhost";
	$root = "root";
	$password = "";
	$dbname = "logbooksystem";


	$conn = mysqli_connect($localhost, $root, $password, $dbname);

	if(!$conn){
		echo "You have an Error" . mysqli_error($conn);
	}

 ?>