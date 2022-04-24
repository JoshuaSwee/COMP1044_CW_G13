<!DOCTYPE HTML>
<html>
	<head>
		<title>Update Book</title>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link rel="stylesheet" href="../../css/form.css"> 
		<link rel="icon" type="image/x-icon" href="../../icon/Logo.jpg">
	</head>
	
	<body style="background-color:#6cb8ff;">
		<div>
			<div class="form_style">
			<a href="../bookpage.html" class="form_return">
				Return
			</a>
			
			<form class="form_style" name="book" method="post" action="updateb.php">
				<legend> Update Book </legend> 
				
				<label for="book_id">Book ID: </label> <br>
				<label id="book_id" name="book_id">
					<?php
						session_start();
						$_SESSION['book_id'] = $_REQUEST['book_id'];
						$book_id = $_REQUEST ["book_id"];
						echo "<span> $book_id";
					?>
				</label>
				<br>
				
				<label for="book_title">Book Title:</label><br>
				<input type="text" id="book_title" name="book_title" placeholder="title"><br>
				
				<label for="category_id">Category:</label><br>
				<select id="category_id" name="category_id">
					<option value=""></option>
					<option value="1"> Periodical </option>
					<option value="2"> English </option>
					<option value="3"> Math </option>
					<option value="4"> Science </option>
					<option value="5"> Encyclopedia </option>
					<option value="6"> Filipiniana </option>
					<option value="7"> Newspaper </option>
					<option value="8"> General </option>
					<option value="9"> References </option>
				</select><br>
				
				<label for="author">Book Author:</label><br>
				<input type="text" id="author" name="author" placeholder="author"><br>
				
				<label for="book_copies">Number of Book Copies:</label><br>
				<input type="number" id="book_copies" name="book_copies" min="1" max="1000" placeholder="1"><br>
				
				<label for="book_pub">Book Publisher:</label><br>
				<input type="text" id="book_pub" name="book_pub" placeholder="publisher" ><br>
				
				<label for="publisher_name">Publisher Name:</label><br>
				<input type="text" id="publisher_name" name="publisher_name" placeholder="publisher name"><br>
				
				<label for="isbn">ISBN:</label><br>
				<input type="text" id="isbn" name="isbn" placeholder="ISBN" pattern = "[0-9-]{0,50}"><br>
				
				<label for="copyright_year">Copyright Year:</label><br>
				<input type="number" id="copyright_year" name="copyright_year" min="1800" max="3000" placeholder="2022"><br>
				
				<label for="status">Status:</label><br>
				<select id="status" name="status">
					<option value=""></option>
					<option value="new"> New </option>
					<option value="old"> Old </option>
					<option value="archive"> Archive </option>
				</select><br>
				
				<!-- date_added -> current date and time-->
				<button type="submit" value="submit">Update</button>
			</form>
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>