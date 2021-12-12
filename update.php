<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Imbue:wght@100&family=Mulish:ital,wght@1,200&display=swap" rel="stylesheet">
</head>
</head>
<body style="text-align: center;">
	<?php 
		include("connection.php");

		if(isset($_GET['update'])){

			$id = $_GET['update'];

			$sql = "SELECT * FROM employee_record WHERE Emp_Id = $id";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);

			if(isset($_POST['submit'])){

				$id = $_POST['id'];
				$newFullname = $_POST['newFullname'];
				$newAddress = $_POST['newAddress'];
				$newContact_Number = $_POST['newContact_Number'];
				$newAge = $_POST['newAge'];
				$newGender = $_POST['newGender'];
				$newPosition = $_POST['newPosition'];

				$sql = "UPDATE employee_record
						SET Emp_Fullname = '$newFullname', Emp_Address = '$newAddress', Emp_Contact = '$newContact_Number', Emp_Age = '$newAge', Emp_Gender = '$newGender', Emp_Position = '$newPosition' WHERE Emp_Id = '$id'";

						if(mysqli_query($conn, $sql)){
							header("location: EmployeeRecord.php? Succesfully Update");
						}
						else{
							echo "ERROR" . mysqli_error($conn);
						}

			}

		}


	 ?>
	 <h1>Update the Employee Information</h1>
	 <div class="UpdateBox">
	 	<form method="post" action="">
			<input type="hidden" name="id" value="<?php echo "$row[Emp_Id]"?>"><br><br>
			Employee Full Name: <input type="text" name="newFullname" value="<?php echo "$row[Emp_Fullname]"?>"><br><br>
			Employee Address: <input type="text" name="newAddress" value="<?php echo "$row[Emp_Address]"?>"><br><br>
			Employee Contact Number: <input type="text" name="newContact_Number" value="<?php echo "$row[Emp_Contact]"?>" pattern="[0-9]{11}"><br><br>
			Employee Age: <input type="text" name="newAge" value="<?php echo "$row[Emp_Age]"?>"><br><br>
			Employee Gander: <input type="text" name="newGender" value="<?php echo "$row[Emp_Gender]"?>"><br><br>
			Employee Position: <input type="text" name="newPosition" value="<?php echo "$row[Emp_Position]"?>"><br><br>
		<input type="submit" name="submit" value="Update" class="submit">
		</form>
	 </div>
	
</body>
</html>
<style type="text/css">
	.UpdateBox{
		background: rgb(187, 181, 187);
		width: 30%;
		transform: translate(520px, 0px);
		height: 336px;
		border-radius: 10px;
	}
	h1{

		font-family: 'Comfortaa', cursive;
		font-family: 'Imbue', serif;
		font-family: 'Mulish', sans-serif;
		transform: translate(12px, 0px);
		letter-spacing: 2px;
	}
	.submit{
		background: rgb(13, 120, 330);
		width: 93px;
		height: 35px;
		color: #fff;
		font-size: 17px;
		border-radius: 10px;
		border: none;
	}
</style>