<!DOCTYPE html>
<html>
	<head>
		<title>Book Added</title>
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
				
				//Getting current book id
				$sql = "SELECT book_id FROM book WHERE book_id=(SELECT max(book_id) FROM book);";
				$result = mysqli_query($conn, $sql);
				$last_id = mysqli_fetch_assoc($result);
				$book_id = $last_id["book_id"] + 1;
				
				//Get form records
				$book_title = $_REQUEST['book_title'];
				$category_id = $_REQUEST['category_id'];
				$author = $_REQUEST['author'];
				$book_copies = $_REQUEST['book_copies'];
				$book_pub = $_REQUEST['book_pub'];
				$publisher_name = $_REQUEST['publisher_name'];
				$isbn = $_REQUEST['isbn'];
				$copyright_year = $_REQUEST['copyright_year'];
				$status = $_REQUEST['status'];
				
				//Getting current date and time
				//Add 6 hours as the time PHP follows is GMT+2
				$date = date ('Y-m-d H:i:sa', strtotime('+6 hours'));
				
				//Database SQL code
				$sql = "INSERT INTO book (book_id, book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, status, date_added) VALUES ('$book_id', '$book_title', '$category_id', '$author', '$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', '$status', '$date');";
				
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
			<meta http-equiv="refresh" content="3;url=../bookpage.html" />
		</center>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>