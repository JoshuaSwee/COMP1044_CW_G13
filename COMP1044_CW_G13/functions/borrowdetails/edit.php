<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Borrow Details</title>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link rel="stylesheet" href="../css/form.css"> 
		<link rel="icon" type="image/x-icon" href="../icon/Logo.jpg">
	</head>
	
	<body style="background-color:#6cb8ff;">
		<div>
			<div class="form_style">
			<a href="borrowdetails.php" class="form_return">
				Return
			</a>
			
			<form class="form_style" name="book" method="post" action="insert.php">
				<center><legend>Edit Borrow Details</legend> </center>
				
				<label for="book_id">Borrow Details ID :</label> <br>
				<label id="book_id" name="book_id">
					<?php
						session_start();
						$borrow_id = $_SESSION['borrow_id'];
						echo "$borrow_id";
					?>	
				</label>
				<br>
				
				<label for="status">Borrow Status:</label><br>
				
				<select id="status" name="status">
					<option value="returned">Returned</option>
					<option value="pending">Pending</option>
				</select><br>

				<button type="submit" value="submit" style = "margin-top: 50px;">Confirm</button>
			</form>
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>