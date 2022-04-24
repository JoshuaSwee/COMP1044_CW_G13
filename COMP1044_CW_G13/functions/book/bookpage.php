<!DOCTYPE html>
<html>
	<head>
		<title>Library</title>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link href="../fontawesome/css/all.min.css" rel="stylesheet"> <!-- https://fontawesome.com/ -->
		<link href="../css/functionbuttons.css" rel="stylesheet" > 
		<link href="../css/searchbar.css" rel="stylesheet"/>
		<link href="../css/form2.css" rel="stylesheet"/>
		<link rel="icon" type="image/x-icon" href="../icon/Logo.jpg">

		<style>
			/*Styling for table */
            table, td, th {  
                border: 1px solid black;
                text-align: left;
                border-collapse: collapse;
            }
            
            th, td {
                padding: 10px;
            }

        </style>

	</head>
	<body style="background-color:#6cb8ff;">
		 <section class="search-filters">
			<div class="container">
				<div class="filter-box">
					<h3>What are you looking for at the library?</h3>
					<form action="bookpage.php" id="booksearch" method="post">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="sr-only" for="keywords">Search by Title</label>
								<input class="form-control" style="border:1px solid" placeholder="Search by Title" id="title" name="title" type="text">
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="sr-only" for="keywords">Search by Author</label>
								<input class="form-control" style="border:1px solid" placeholder="Search by Author" id="author" name="author" type="text">
							</div>
						</div>
						<div class="col-md-4 col-sm-6" style="width:33.33333333%">
							<div class="form-group">
								<label class="sr-only" for="keywords">Search by ISBN</label>
								<input class="form-control" style="border:1px solid" placeholder="Search by ISBN" id="isbn" name="isbn" type="text" pattern = "[0-9-]{0,50}">
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<select name="category" style="border:1px solid" id="category" class="form-control">
									<option>All Categories</option>
									<option>Periodical</option>
									<option>English</option>
									<option>Math</option>
									<option>Science</option>
									<option>Encyclopedia</option>
									<option>Filipiniana</option>
									<option>Newspaper</option>
									<option>General</option>
									<option>References</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="form-group">
								<input class="form-control" type="submit" value="Search">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		

		<div class="tm-container">
			<nav class="tm-main-nav">
				<ul id="inline-popups">
					<li class="tm-nav-item">
						<a href="add/addbook.html" class="tm-nav-link">
							Add A Book
							<i class="fas fa-3x fa-folder-plus"></i>
						</a>                
					</li>
					<li class="tm-nav-item">
						<a href="../member/memberpage.html" class="tm-nav-link">
							Members
							<i class="fas fa-3x fa-user-friends"></i>
						</a>                
					</li>
					<li class="tm-nav-item">
						<a href="../borrowdetails/borrowdetails.php"  class="tm-nav-link">
							 Borrow Details
							 <i class="fas fa-3x fa-info"></i>
	 
						 </a>               
					 </li>
				</ul>
			</nav>
		</div>
		<div class="tm-container" style="margin-top:50px; background-color:white; padding:30px">
			<?php

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
				
				$book_title = $_POST['title'];
				$author = $_POST['author'];
				$isbn = $_POST['isbn'];
				$category = $_POST['category'];
				
				if ($category != 'All Categories'){
					$sql = "SELECT * FROM book,category WHERE book_title LIKE '$book_title%' && author LIKE '$author%' && isbn LIKE '$isbn%' && category.classname LIKE '$category' && 		book.category_id = category.category_id";
				}
				else if ($category == 'All Categories')
					$sql = "SELECT * FROM book  WHERE book_title LIKE '$book_title%' && author LIKE '$author%' && isbn LIKE '$isbn%'";
				
				$result = $conn -> query($sql);
				
				echo "<p><b><center>Search Results:</center></b><p>\n";
				
				if ($result->num_rows > 0) {
					
				echo "<table style=\"margin-left:auto;margin-right:auto\">
					<tr>
						<th width='90'>Book ID</th>
						<th width='150'>Book Title</th>
						<th width='90'>Category ID</th>
						<th width='100'>Author</th>
						<th width='90'>Book Copies</th>
						<th width='150'>Book Publisher</th>
						<th width='150'>Publisher Name</th>
						<th width='100'>ISBN</th>
						<th width='90'>Copyright Year</th>
						<th width='100'>Date Added</th>
					</tr>";
					// output data of each row
					while($row = $result->fetch_assoc()) {
						
						echo "
							<tr>
								<td width='90'align=center>" . $row["book_id"]. "</td>
								<td width='150' align=center>" . $row["book_title"]. "</td>
								<td width='90' align=center>" . $row["category_id"]. "</td>
								<td width='100' align=center>" . $row["author"]. "</td>
								<td width='90' align=center>" . $row["book_copies"]. "</td>
								<td width='150' align=center>" . $row["book_pub"]."</td>
								<td width='150' align=center>" . $row["publisher_name"]."</td>
								<td width='100' align=center>" . $row["isbn"]."</td>
								<td width='90' align=center>" . $row["copyright_year"]."</td>
								<td width='100' align=center>" . $row["date_added"]."</td>
							</tr>";
					}
					echo "</table>";
				}
					else {
							echo "<center>No results</center>";
					}
					
				$conn->close();
			?>
		</div>
		
		<div class="tm-container" style="margin-top:40px; background-color:white; padding:30px">
			<form class="form_style" action="delete/deleteb.php">
				<center>
					<h3>Please confirm the Book ID you would like to delete.</h3>
					<h3>The record could not be recovered once deleted.</h3>
					<input type='number' id="book_id" name="book_id" placeholder="book_id"\><br>
					<button type="submitx">Confirm</button>
				</center>
			</form>
		</div>
		
		<div class="tm-container" style="margin-top:40px; background-color:white; padding:30px">
			<form class="form_style" method="post" action="update/updatebook.php">
				<center>
					<h3>Please confirm the Book ID you would like to update.</h3>
					<input type='number' id="book_id" name="book_id" placeholder="book_id"\><br>
					<button type="submitx">Confirm</button>
				</center>
			</form>
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>

</html>