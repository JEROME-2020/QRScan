<style type="text/css">
	.search{
		transform: translate(104px, 0px);
		height: 25px;
		text-align: center;
		border-radius: 5px;
		width: 235px;
	}
	body{
		background: #fff;

	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Logbook System width Contact Tracing</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="ok.jpg" type="image/x-icon"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Imbue:wght@100&family=Mulish:ital,wght@1,200&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">
		<div class="extra"></div>
		<div class="header"><h1>Welcome to Admin Logbook System Width Contact Tracing</h1></div>
		<div class="nabigation">
			<div class="nav1"></div>
			<div class="nav2">
				<div class="ChildeNav1"><a href="Admin.php"><label class="Conl1">Regiter Employee</label></a></div>
				<div class="ChildeNav2"><a href="EmployeeRecord.php"><label class="Conl2">All Employee</label></a></div>
				<div class="ChildeNav3"><a href="logbookRecord.php"><label class="Conl3">Logbook Record</label></a></div>
			</div>
		</div>
		<div class="content">
			<br>
			<br>
			<div class="form">
				<form method="post" action="logbookRecord.php">
					<input class="selectbtn" type="Submit" name="SelectAllEmp" value="TIME IN" title="Select to show Time In Record">&nbsp;&nbsp;
					<input class="selectbtn" type="Submit" name="TimeOut_btn" value="TIME OUT" title="Select to show Time Out Record">&nbsp;&nbsp;
					<input class="selectbtn" type="Submit" name="search_btn" value="SEARCH:" title="Click her to search the name of employee you want to see" style="background: rgb(100, 200, 100);">
					<input type="text" name="search" class="search" placeholder="Search the name of employee">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
	
	include("connection.php");

	if(isset($_POST['SelectAllEmp'])){

		echo "<br>";
		$sql = "SELECT * FROM logbook_record";


		$result = mysqli_query($conn, $sql);

		echo "<table border='1'>";
			echo "<tr>";
					echo "<th>Employee Name</th>";
					echo "<th>Employee Address</th>";
					echo "<th>Employee Contact</th>";
					echo "<th>Employee Age</th>";
					echo "<th>Employee Position</th>";
					echo "<th>Employee Body Temperature</th>";
					echo "<th>Employee Time In</th>";
					echo "<th></th>";
			echo "</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				print_r($row);
		echo "<tr>";
					echo "<td>" . $row['RecordEmp_Fullname'] . "</td>";
					echo "<td>" . $row['RecordEmp_Address'] . "</td>";
					echo "<td>" . $row['RecordEmp_ContactNumber'] . "</td>";
					echo "<td>" . $row['RecordEmp_Age'] . "</td>";
					echo "<td>" . $row['RecordEmp_Position'] . "</td>";
					echo "<td>" . $row['RecordEmp_BodyTemp'] . "</td>";
					echo "<td>" . $row['RecordEmp_Time_IN'] . "</td>";
					echo "<td><a href='delete.php?delete=$row[ID]'>Delete</a></td>"; 
				echo "</tr>";
			}
			echo "</table>";



	}
	if(isset($_POST['search_btn'])){

		$search = $_POST['search'];

		$sql = "SELECT * FROM logbook_record WHERE RecordEmp_Fullname LIKE '%{$search}%'";
		$result = mysqli_query($conn, $sql);

		echo "<br>";

		echo "<table border='1'>";
			echo "<tr>";
					echo "<th>Employee Name</th>";
					echo "<th>Employee Address</th>";
					echo "<th>Employee Contact</th>";
					echo "<th>Employee Age</th>";
					echo "<th>Employee Position</th>";
					echo "<th>Employee Body Temperature</th>";
					echo "<th>Employee Time In</th>";
					echo "<th></th>";
			echo "</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
					echo "<td>" . $row['RecordEmp_Fullname'] . "</td>";
					echo "<td>" . $row['RecordEmp_Address'] . "</td>";
					echo "<td>" . $row['RecordEmp_ContactNumber'] . "</td>";
					echo "<td>" . $row['RecordEmp_Age'] . "</td>";
					echo "<td>" . $row['RecordEmp_Position'] . "</td>";
					echo "<td>" . $row['RecordEmp_BodyTemp'] . "</td>";
					echo "<td>" . $row['RecordEmp_Time_IN'] . "</td>";
					echo "<td><a href='delete.php?delete=$row[ID]'>Delete</a></td>"; 
				echo "</tr>";
			}
			echo "</table>";
	}
	if(isset($_POST['TimeOut_btn'])){


		echo "<br>";
		$sql3 = "SELECT * FROM employee_record INNER JOIN timeout_record WHERE employee_record.Emp_Id = timeout_record.Emp_Id";


				$result = mysqli_query($conn, $sql3);


				echo "<table border='1'>";
			echo "<tr>";
					echo "<th>Employee Name</th>";
					echo "<th>Employee Address</th>";
					echo "<th>Employee Contact</th>";
					echo "<th>Employee Age</th>";
					echo "<th>Employee Time Out </th>";
					echo "<th>Employee Position</th>";
					echo "<th>Employee Body Temperature</th>";
					echo "<th></th>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
					echo "<td>" . $row['Emp_Fullname'] . "</td>";
					echo "<td>" . $row['Emp_Address'] . "</td>";
					echo "<td>" . $row['Emp_Contact'] . "</td>";
					echo "<td>" . $row['Emp_Age'] . "</td>";
					echo "<td>" . $row['Emp_TimeOut'] . "</td>";
					echo "<td>" . $row['Emp_Position'] . "</td>";
					echo "<td>" . $row['Emp_bodyTem'] . "</td>";
					echo "<td><a href='delete.php?delete=$row[Emp_Id]'>Delete</a></td>"; 
				echo "</tr>";
			}
			echo "</table>";
		
	}




 ?>