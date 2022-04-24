<html>
	<head>
		<title>Forgot Password</title>
		<link rel="stylesheet" href="css/login.css"> 
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link href="fontawesome/css/all.min.css" rel="stylesheet"> <!-- https://fontawesome.com/ -->
		<link rel="icon" type="image/x-icon" href="icon/Logo.jpg">
	</head>
	
	<body style="background-color:#6cb8ff;">
		<div class="form_style">
		<form action ="forgot.php" method = "post">
		
				<center><legend style = "font-size:43px;">Forgot Password</legend></center>		
				
				<center><label for="username">Enter your username</label><br></center>
				<input type="text" name="username" id="username" placeholder="Username" required><br>
					
				<button type="Submit">Reset Password</button>
				
		</form>
		</div>
		<div "tm-container" style="margin-top:50px; background-color:white; padding:30px; margin-left:500; margin-right: 500; border-radius:10px;">
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
				
				$uname = $_POST['username'];
				
				$sql = "SELECT * FROM users WHERE username LIKE '$uname'";
				
				$result = $conn -> query($sql);
				
				if ($result->num_rows > 0){
					session_start();
					$_SESSION['superhero'] = $uname;
					header('Location: reset.html');
					exit();	
				}
				else{
					echo "<center style = \"color:red;\">Invalid Username !</center>";
				}
				
				
			$conn->close();
		?>	
		</div>
	</body>
	
</html>