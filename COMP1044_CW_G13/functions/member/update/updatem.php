<!DOCTYPE HTML>
<html>
	<head>
		<title>Update Book</title>
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
				
				session_start();
				
				//Getting parameters
				$member_id = $_SESSION["member_id"];
				$firstname = $_REQUEST["firstname"];
				$lastname = $_REQUEST["lastname"];
				$gender = $_REQUEST["gender"];
				$address = $_REQUEST["address"];
				$contact = $_REQUEST["contact"];
				$type_id = $_REQUEST["type_id"];
				$year_level = $_REQUEST["year_level"];
				$status = $_REQUEST["status"];

				// check if target member exists
				$searchmember = "SELECT * FROM member WHERE member_id = $member_id";
				$searchresult = $conn->query($searchmember);

				if ($searchresult->num_rows >0){
					// member exists, can update
					if ($firstname != ""){
						$sql = "UPDATE member SET firstname = '$firstname' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated first name successfully!";
						}
					}
					if ($lastname != ""){
						$sql = "UPDATE member SET lastname = '$lastname' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated last name successfully!";
						}
					}
					if ($gender != ""){
						$sql = "UPDATE member SET gender = '$gender' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated gender successfully!";
						}
					}
					if ($address != ""){
						$sql = "UPDATE member SET address = '$address' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated address successfully!";
						}
					}
					if ($contact != ""){
						$sql = "UPDATE member SET contact = '$contact' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated contact successfully!";
						}
					}
					if ($type_id != ""){
						$sql = "UPDATE member SET type_id = '$type_id' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated type id successfully!";
						}
					}
					if ($year_level != ""){
						$sql = "UPDATE member SET year_level = '$year_level' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated year level successfully!";
						}
					}
					if ($status != ""){
						$sql = "UPDATE member SET status = '$status' WHERE member_id = '$member_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated status successfully!";
						}
					}
				}
				else{
					// member does not exist
					echo "<br>" . "Member to be updated not found!";
				}
				$conn -> close();
			?>
			
			<!--Redirecting to choices page-->
			<br>
			<h3>Redirecting in 3 seconds...</h3>
			<meta http-equiv="refresh" content="3;url=../memberpage.html" />
		</center>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>