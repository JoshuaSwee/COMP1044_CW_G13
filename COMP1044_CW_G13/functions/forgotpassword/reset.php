<html>
	<head>
		<title>Reset Password</title>
		<link rel="stylesheet" href="../css/login.css"> 
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link href="fontawesome/css/all.min.css" rel="stylesheet"> <!-- https://fontawesome.com/ -->
		<link rel="icon" type="image/x-icon" href="../icon/Logo.jpg">
	</head>
	
	<body style="background-color:#6cb8ff;">
		<div class="form_style" style = "margin-top:50px;">
		<a href="../../Login.html" class="form_return">
			Return
		</a>
		<form action ="reset.php" method = "post" >
		
				<center><legend style = "font-size:45px">New Password</legend></center>		
				
				<input type="password" name="password" id="password" placeholder="Create New Password" required style = "margin-top:10px;"><br>
				
				<input type="password" name="password2" id="password" placeholder="Confirm Your Password" required><br>
				
				<button type="Submit">Reset Password</button>
				
		</form>
		</div>
		<div "tm-container" style="margin-top:50px; background-color:white; padding:30px; margin-left:500; margin-right: 500; border-radius:10px;">
		<?php
				session_start(); 
				$uname = $_SESSION['superhero'];
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
				
				$password = $_POST['password'];
				$password2 = $_POST['password2'];
				
				
				if($password == $password2){
								
					$sql = "UPDATE users SET password = '$password' WHERE username LIKE '$uname'";
					
					if ($conn->query($sql) === TRUE) {
						header('Location: successful.html');
						exit();	
					}
					else {
						echo "Error please retry again later";
					}					
				}
				else 
					echo "<center style= \"color: red;\">Password Do Not Match !</center>";
				
				
			$conn->close();
		?>	
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
	
</html>