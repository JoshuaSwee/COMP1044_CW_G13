<!DOCTYPE HTML>
<html>
	<head>
		<title>Update Member</title>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link rel="stylesheet" href="../../css/form.css"> 
		<link rel="icon" type="image/x-icon" href="../../icon/Logo.jpg">
	</head>
	
	<body style="background-color:#6cb8ff;">
		<div class="form_style">
			<a href="../memberpage.html" class="form_return">
				Return
			</a>
			<form class="form_style" name="member" method="post" action="updatem.php">
				<legend> Update a Member </legend>
				
				<label for="member_id">Member ID: </label> <br>
				<label id="member_id" name="member_id">
					<?php
						session_start();
						$_SESSION['member_id'] = $_REQUEST['member_id'];
						$member_id = $_REQUEST ["member_id"];
						echo "<span> $member_id";
					?>
				</label>
				<br>
				
				<label for="name">First Name: </label>
				<input type="text" id="firstname" name="firstname"><br>
				
				<label for="name">Last Name: </label>
				<input type="text" id="lastname" name="lastname"><br>
				
				<label for="gender">Gender:</label>
					<select id="gender" name="gender">
						<option value=""></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
					</select><br>

				<label for="address">Address:</label>
				<textarea name="address" rows="10" cols="50" placeholder="address"></textarea><br>
				
				<label for="contact">Contact Number:</label>
				<input type="number" id="contact" name="contact" min="0" max="999999999999999" placeholder="contact"><br>
				
				<label for="type_id">Type:</label>
					<select id="type_id" name="type_id">
						<option value=""></option>
						<option value="2"> Teacher </option>
						<option value="20"> Employee </option>
						<option value="21"> Non-Teaching </option>
						<option value="22"> Student </option>
						<option value="32"> Construction </option>
					</select><br>

				
				<label for="year_level">Year Level:</label>
					<select id="year_level" name="year_level">
						<option value=""></option>
						<option value="First Year">First Year</option>
						<option value="Second Year">Second Year</option>
						<option value="Third Year">Third Year</option>
						<option value="Forth Year">Forth Year</option>
						<option value="Faculty">Faculty</option>
					</select><br>

				<label for="status">Status:</label>
					<select id="status" name="status">
						<option value=""></option>
						<option value="Active">Active</option>
						<option value="Banned">Banned</option>
					</select><br>

					
				<button type="submit">Update</button>
			</form>
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>