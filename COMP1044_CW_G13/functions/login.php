<!DOCTYPE html>
<html>
	<head>
		<title>Library Login</title>
		<link rel="stylesheet" href="css/login.css"> 
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link href="fontawesome/css/all.min.css" rel="stylesheet"> <!-- https://fontawesome.com/ -->
		<link rel="icon" type="image/x-icon" href="icon/Logo.jpg">
	</head>
	
	<body style="background-color:#6cb8ff;">		
		<div>
			<?php
				$servername = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$database = "librarydb";
				
				// Create connection
				$conn = new mysqli($servername, $dbusername, $dbpassword, $database);
				
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				echo "Connected successfully";
				
				$uname = $_REQUEST['username'];
				$pass = $_REQUEST['password'];
				
				$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
				
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) === 1){
					$row = mysqli_fetch_assoc($result);
					if($row['username'] === $uname && $row['password'] === $pass){
						echo "Loging In";
						header("Location: choices.html");
						exit();
					}
				}
				else{
					header("Location: Loginerr.html?error = Incorrect username or password");
					exit();
				}
			?>
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
	
</html>		