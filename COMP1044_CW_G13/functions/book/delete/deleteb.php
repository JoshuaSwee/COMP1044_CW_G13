<!DOCTYPE html>
<html>
	<head>
		<title>Book Deletion</title>
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
				
				//Deleting by book id
				$book_id = $_REQUEST['book_id'];

				// Checking if book to be deleted exists
				$searchbook = "SELECT * FROM book WHERE book_id = $book_id";
				$searchresult = $conn->query($searchbook);
				if ($searchresult->num_rows > 0){
					// book exists, delete
					$sql = "DELETE FROM book WHERE book_id = '$book_id';";
					
					//Executing SQL in Database
					$rs = mysqli_query($conn, $sql);
					
					if($rs){
						echo "<br>" . "Book deleted successfully!";
					}
				}
				else{
					// book doesn't exist
					echo "<br>" . "Book to be deleted does not exist!";
				}
				
				$conn->close();

			?>
			
			<!--Redirecting to choices page-->
			<br>
			<h3>Redirecting in 3 seconds...</h3>
			<meta http-equiv="refresh" content="3;url=../bookpage.html" />
		</center>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>