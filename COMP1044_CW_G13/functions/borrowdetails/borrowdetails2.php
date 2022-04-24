<!DOCTYPE html>
<html>
	<head>
		<title>Library</title>
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
		<link href="../fontawesome/css/all.min.css" rel="stylesheet"> <!-- https://fontawesome.com/ -->
		<link href="../css/functionbuttons.css" rel="stylesheet" > 
		<link href="../css/searchbar.css" rel="stylesheet"/>
		<link href="../css/table.css" rel = "stylesheet"/>
		<link rel="icon" type="image/x-icon" href="../icon/Logo.jpg">
		<link href="../css/form2.css" rel="stylesheet"/>
	</head>

	<body style="background-color:#6cb8ff;">
		<div "tm-container" style="margin-top:20px; background-color:white; padding:30px; margin-left:300px; margin-right:300px; border-radius: 10px;">	
		<center><h1 style = "margin-top:10px;">Borrow Details</h1></center>
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
				
				session_start();
				
				$sql = "SELECT borrow_details_id, book_id, borrowdetails.borrow_id, borrow_status, due_date, date_return, borrow.member_id, member.firstname, member.lastname FROM borrowdetails JOIN borrow ON borrowdetails.borrow_id = borrow.borrow_id JOIN member ON borrow.member_id = member.member_id";
				
				
				$result = $conn -> query($sql);
				
				if ($result->num_rows > 0) {
				
				
				echo "<table style=\"margin-left:auto;margin-right:auto;margin-bottom:40px;\">
					<tr>
						<th width='150'>Borrow Details ID</th>
						<th width='150'>Book ID</th>
						<th width='90'>Borrow ID</th>
						<th width='130'>Borrow Status</th>
						<th width='130'>Due Date</th>
						<th width='130'>Date Return</th>
						<th width='90'>Member ID</th>
						<th width='130'>First Name</th>
						<th width='130'>Last Name</th>
					</tr>";
					// output data of each row
					while($row = $result->fetch_assoc()) {
						
						echo "
							<tr>
								<td width='90'align=center>" . $row["borrow_details_id"]. "</td>
								<td width='150' align=center>" . $row["book_id"]. "</td>
								<td width='90' align=center>" . $row["borrow_id"]. "</td>
								<td width='100' align=center>" . $row["borrow_status"]. "</td>
								<td width='90' align=center>" . $row["due_date"]. "</td>
								<td width='90' align=center>" . $row["date_return"]. "</td>
								<td width='90' align=center>" . $row["member_id"]. "</td>
								<td width='150' align=center>" . $row["firstname"]. "</td>
								<td width='150' align=center>" . $row["lastname"]. "</td>
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
		</section>
		
		<div class="tm-container" style = "margin-bottom:5px;margin-top:10px;">
			<nav class="tm-main-nav">
				<ul id="inline-popups">
					<li class="tm-nav-item">
						<a href="../book/bookpage.html" class="tm-nav-link">
							Book
							<i class="fas fa-3x fa-book"></i>
						</a>                 
					</li>
					<li class="tm-nav-item">
						<a href="../member/memberpage.html" class="tm-nav-link">
							Members
							<i class="fas fa-3x fa-user-friends"></i>
						</a>                
					</li>
					<li class="tm-nav-item">
						<a href="addborrow.html" class="tm-nav-link">
							Borrow a Book
							<i class="fas fa-3x fa-folder-plus"></i>
						</a>                
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="tm-container-2" style="margin-top:10px; background-color:white; padding:30px; margin-bottom: 80px; margin-left: 300px; margin-right: 300px; border-radius: 10px;">
			<form class="form_style" method="post" action="borrowdetails2.php">
				<center>
					<h3>Please Enter the Borrow Details ID of the borrow detail you would like to edit.</h3>
					<input type='number' id="book_id" name="borrow_id" placeholder = "ID" required><br>
					<button type="submitx">Confirm</button>
				</center>
			</form>
		</div>
		<div class="tm-container-2" style="margin-top:5px; background-color:white; padding:30px; margin-bottom: 100px; margin-left: 300px; margin-right: 300px; border-radius: 10px;"
		>
		<?php 
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "librarydb";
			
			$borrow_id = $_POST['borrow_id'];
			
					
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);	
			}
			
			$sql = "SELECT * FROM borrowdetails WHERE borrow_details_id = $borrow_id";
			
			$result = $conn -> query($sql);
			
			if ($result->num_rows > 0) {
				//session_start();
				$_SESSION['borrow_id'] = $borrow_id;
				echo "<meta http-equiv='refresh' content='0.5,url=edit.php' />";
				//header('Location: edit.php');
			}
			else {
				echo "<center style=\"color:red\">Please Enter a valid Borrow Details ID</center>";		
			}
			
			$conn->close();
		?>
		</div>
		<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
	</body>
</html>