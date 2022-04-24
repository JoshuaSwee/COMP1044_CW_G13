<!DOCTYPE html>
<html>
	<head>
		<title>Member Deleted</title>
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
					
					//Deleting by member id
					$member_id = $_GET['member_id'];
					
					// check if target member exists
					$searchmember = "SELECT * FROM member WHERE member_id = $member_id";
					$searchresult = $conn->query($searchmember);

					if ($searchresult-> num_rows > 0){

						// member exists, delete
						$sql = "DELETE FROM member WHERE member_id = '$member_id';";
						
						//Executing SQL in Database
						$rs = mysqli_query($conn, $sql);
						
						if($rs){
							echo "<br>" . "Member deleted successfully!";
						}
					}
					else{
						// member does not exist
						echo "<br>" . "Member to be deleted not found!";
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