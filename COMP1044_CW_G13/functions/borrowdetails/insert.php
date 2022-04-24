<html>
<head>
	
		<title>Library</title>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link rel="icon" type="image/x-icon" href="../icon/Logo.jpg">
		<link href="../css/button.css" rel="stylesheet"/>
</head>



<body style="background-color:#6cb8ff;">
<div "tm-container" style="margin-top:20px; background-color:white; padding:30px; margin-left:300px; margin-right:300px; border-radius: 10px;">	
	<?php

			session_start();
			$borrow_id = $_SESSION['borrow_id'];
			$status = $_POST['status'];
			
			$datetime = date ('Y-m-d H:i:sa', strtotime('+6 hours'));
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "librarydb";
				
						
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);	
			}
			
			if ($status == 'returned'){
				$sql = "UPDATE borrowdetails SET borrow_status = '$status', date_return = '$datetime' WHERE borrow_details_id = $borrow_id ";
			
				if ($conn->query($sql) === TRUE) {
				  echo "<center style =\"font-size:40px;color:green;\" >Record updated successfully !</center><br>";
				} else {
				  echo "Error updating record: " . $conn->error;
				  
				}
			}
			else {
				$sql = "UPDATE borrowdetails SET borrow_status = '$status', date_return = '0000-00-00 00:00:00' WHERE borrow_details_id = $borrow_id ";
			
				if ($conn->query($sql) === TRUE) {
				  echo "<center style =\"font-size:40px;color:green;\" >Record updated successfully !</center><br>";
				} else {
				  echo "Error updating record: " . $conn->error;
				  
				}
			}
			
	?>
	<center><a href = "../borrowdetails/borrowdetails.php"><button type="submitx" style = "margin-top: 50px;" class = "button">Confirm</button></center></a>
</div>
<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
</body>
</html>