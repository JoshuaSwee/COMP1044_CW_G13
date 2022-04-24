<!DOCTYPE html>
<html>
	<head>
		<title>Member Added</title>
		<link rel="icon" type="image/x-icon" href="../../icon/Logo.jpg">
	</head>
	
	<body>
		<center>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "librarydb";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $database);
				
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
				//Getting current member id
				$sql = "SELECT member_id FROM member WHERE member_id=(SELECT max(member_id) FROM member);";
				$result = mysqli_query($conn, $sql);
				$last_id = mysqli_fetch_assoc($result);
				$member_id = $last_id["member_id"] + 1;
				
				//Get form records
				$firstname = $_REQUEST['firstname'];
				$lastname = $_REQUEST['lastname'];
				$gender = $_REQUEST['gender'];
				$address = $_REQUEST['address'];
				$contact = $_REQUEST['contact'];
				$type_id = $_REQUEST['type_id'];
				$year_level = $_REQUEST['year_level'];
				$status = $_REQUEST['status'];
				
				//Database SQL code
				$sql = "INSERT INTO member (member_id, firstname, lastname, gender, address, contact, type_id, year_level, status) VALUES ('$member_id', '$firstname', '$lastname', '$gender', '$address', '$contact', '$type_id', '$year_level','$status');";
				
				//Inserting into database
				$rs = mysqli_query($conn, $sql);
				
				if($rs){
					echo "<br>" . "New record created successfully!";
				}
				
				$conn->close();

			?>

			<!--Redirecting to choices page-->
			<br>
			<h3>Redirecting in 3 seconds...</h3>
			<meta http-equiv="refresh" content="3;url=../memberpage.html" />
		
		</center>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>