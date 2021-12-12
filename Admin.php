<!DOCTYPE html>
<html>
<head>
	<title>Employee Logbook System width Contact Tracing</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="ok.jpg" type="image/x-icon" />
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
				<form style="text-align: center;" method="post" action="RegisterEmployee.php">
					<br>
					<h2>Register Employee Information to generate QR code</h2>
					<br>
					<label>Full Name: </label><input type="text" name="Fullname" placeholder="Juan D. Delacrus" required><br><br>
					<label>Address: </label><input type="text" name="Address" placeholder="Barangay Mahanap Cabanatuan City" required><br><br>
					<label>Contact: </label><input type="text" name="Contact" placeholder="09012168" pattern="[0-9]{11}" required><br><br>
					<label>Age: </label><input type="text" name="Age" placeholder="24" required><br><br><br>
					<label>GENDER</label><br><br>
					<label>Male</label><input type="Radio" name="Sex" value="Male">
					<label>Female</label><input type="Radio" name="Sex" value="Female"><br><br>
					<label>Select The Position of Employee</label>
					<select name="Position">
						<option value="Manager">Manager</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Clerk">Clerk</option>
						<option value="Utility">Utility</option>
					</select><br><br>
					<input type="Submit" name="Save" class="btn1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Cleare" class="btn2">
				</form>
			</div>
		</div>
	</div>
</body>
</html>