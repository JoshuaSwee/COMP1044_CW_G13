<!DOCTYPE HTML>
<html>
	<head>
		<title>Update Book Borrow Details</title>
		<link rel="icon" type="image/x-icon" href="../icon/Logo.jpg">
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
				echo "Connected Sucessfully";
				
				//Getting parameters
				$book_id = $_REQUEST["book_id"];
				$member_id = $_REQUEST["member_id"];
				$date_borrow = date ('Y-m-d H:i:sa', strtotime('+6 hours'));

				// Checking if book to be updated exists
				$searchbook = "SELECT * FROM book WHERE book_id = $book_id";
				$searchresult = $conn->query($searchbook);
				$searchmember = "SELECT * FROM member WHERE member_id = $member_id";
				$searchresult2 = $conn->query($searchmember);
				
				if ($searchresult->num_rows > 0){
					if ($searchresult2 -> num_rows > 0){
						//if both member and book exists
						
						//Creating borrow id
						$sql = "SELECT borrow_id FROM borrow WHERE borrow_id=(SELECT max(borrow_id) FROM borrow);";
						$result = mysqli_query($conn, $sql);
						$last_id = mysqli_fetch_assoc($result);
						$borrow_id = $last_id["borrow_id"] + 1;
						
						//creating borrow details id
						$sql = "SELECT borrow_details_id FROM borrowdetails WHERE borrow_details_id=(SELECT max(borrow_details_id) FROM borrowdetails);";
						$result = mysqli_query($conn, $sql);
						$last_id = mysqli_fetch_assoc($result);
						$borrow_details_id = $last_id["borrow_details_id"] + 1;
						
						//Creating due-date
						$due_date = date('Y-m-d', strtotime('+1 week'));
						
						//Adding into borrow table
						$sql = "INSERT INTO borrow (borrow_id, member_id, date_borrow, due_date) VALUES ('$borrow_id', '$member_id', '$date_borrow', '$due_date');";
						$rs = mysqli_query($conn,$sql);
						
						//Adding into borrowdetails table
						$sql = "INSERT INTO borrowdetails (borrow_details_id, book_id, borrow_id, borrow_status) VALUES ('$borrow_details_id', '$book_id', '$borrow_id', 'pending');";
						$rn = mysqli_query($conn,$sql);
						
						if ($rs && $rn){
							echo "<br>Borrow details updated successfully" . "<br>";
						}
					}
					else {
						echo "<br>" . "Member not found!" . "<br>";
					}
				}
				else{
					// book doesn't exist
					echo "<br>" . "Book not found!" . "<br>";
				}
				$conn -> close();
			?>
			
			<!--Redirecting to choices page-->
			<br>
			<h3>Redirecting in 3 seconds...</h3>
			<meta http-equiv="refresh" content="3;url=borrowdetails.php" />
		</center>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>