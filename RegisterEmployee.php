

<style type="text/css">
	.Error{
		background: rgb(330, 130, 130);
		width: 100%;
		height: 30px;
		text-align: center;
		font-size: 20px;
		color: #fff;
	}
	.MessageOK{
		background: rgb(130, 130, 330);
		width: 100%;
		height: 30px;
		text-align: center;
		font-size: 20px;
		color: #fff;
	}
</style>
<?php 



include("connection.php");

 if(isset($_POST['Save'])){

 	$Fullname = $_POST['Fullname'];
 	$Address = $_POST['Address'];
 	$Contact = $_POST['Contact'];
 	$Age = $_POST['Age'];
 	$Sex = $_POST['Sex'];
 	$Position = $_POST['Position'];


 	$sql1 = "SELECT * FROM employee_record WHERE Emp_Fullname = '$Fullname'";

 	$result = mysqli_query($conn, $sql1);
	$count = mysqli_num_rows($result);

 	if($count>0){
		echo "<div class='Error'>Warning! The Name is use &#9785;</div>";	
	}
	else{

		$sql2 = "INSERT INTO employee_record (Emp_Fullname, Emp_Address, Emp_Contact, Emp_Age, Emp_Gender, Emp_Position) 
				VALUES('$Fullname', '$Address', '$Contact', '$Age', '$Sex', '$Position')";
		
		if(mysqli_query($conn, $sql2)){
				echo "<img src='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=$Fullname, $Address,$Contact,$Age,$Position' height=250 width=250/>";
				echo "<div class='MessageOK'>The Employee is recorded sucessfuly, pleaz Screenshot the QR code and give it from employee &#9786;</div>";
				
		}
		else{
			echo "ERROR" . mysqli_error($conn);
		}

	}

 
}	

 ?>