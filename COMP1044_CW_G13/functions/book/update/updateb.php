<!DOCTYPE HTML>
<html>
	<head>
		<title>Update Book</title>
		<link rel="icon" type="image/x-icon" href="../../sicon/Logo.jpg">
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
				$book_id = $_SESSION["book_id"];
				$book_title = $_REQUEST["book_title"];
				$category_id = $_REQUEST["category_id"];
				$author = $_REQUEST["author"];
				$book_copies = $_REQUEST["book_copies"];
				$book_pub = $_REQUEST["book_pub"];
				$publisher_name = $_REQUEST["publisher_name"];
				$isbn = $_REQUEST["isbn"];
				$copyright_year = $_REQUEST["copyright_year"];
				$status = $_REQUEST["status"];

				// Checking if book to be updated exists
				$searchbook = "SELECT * FROM book WHERE book_id = $book_id";
				$searchresult = $conn->query($searchbook);
				if ($searchresult->num_rows > 0){
					// book exists, update
					if ($book_title != ""){
						$sql = "UPDATE book SET book_title = '$book_title' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated book title successfully!";
						}
					}
					if ($category_id != ""){
						$sql = "UPDATE book SET category_id = '$category_id' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated category id successfully!";
						}
					}
					if ($author != ""){
						$sql = "UPDATE book SET author = '$author' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated author successfully!";
						}
					}
					if ($book_copies != ""){
						$sql = "UPDATE book SET book_copies = '$book_copies' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated book copies successfully!";
						}
					}
					if ($book_pub != ""){
						$sql = "UPDATE book SET book_pub = '$book_pub' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated book publisher successfully!";
						}
					}
					if ($publisher_name != ""){
						$sql = "UPDATE book SET publisher_name = '$publisher_name' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated publisher name successfully!";
						}
					}
					if ($isbn != ""){
						$sql = "UPDATE book SET isbn = '$isbn' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated ISBN successfully!";
						}
					}
					if ($copyright_year != ""){
						$sql = "UPDATE book SET copyright_year = '$copyright_year' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated copyright year successfully!";
						}
					}
					if ($status != ""){
						$sql = "UPDATE book SET status = '$status' WHERE book_id = '$book_id';";
						//Inserting into database
						$rs = mysqli_query($conn, $sql);
						if($rs){
							echo "<br>" . "Updated status successfully!";
						}
					}
				}

				else{
					// book doesn't exist
					echo "<br>" . "Book to be updated does not exist!";
				}
				$conn -> close();
			?>
			
			<!--Redirecting to choices page-->
			<br>
			<h3>Redirecting in 3 seconds...</h3>
			<meta http-equiv="refresh" content="3;url=../bookpage.html" />
		</center>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>