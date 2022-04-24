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
                <h3>Manage Members</h3>
                <form action="memberpage.php" id="membersearch" method="get">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="sr-only" for="keywords">Search by First Name</label>
                            <input class="form-control" style="border:1px solid" placeholder="Search by First Name" id="first_name" name="first_name" type="text">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="sr-only" for="keywords">Search by Last Name</label>
                            <input class="form-control" style="border:1px solid" placeholder="Search by Last Name" id="last_name" name="last_name" type="text">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6" style="width:33.33333333%">
                        <div class="form-group">
                            <label class="sr-only" for="keywords">Search by Member ID</label>
                            <input type="number" class="form-control" style="border:1px solid" placeholder="Search by Member ID" id="member_id" name="member_id" type="text">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6" style="width:33.33333333%">
                        <div class="form-group">
                            <label class="sr-only" for="keywords">Search by Contact Number</label>
                            <input type="number" class="form-control" style="border:1px solid" placeholder="Search by Contact Number" id="contact_no" name="contact_no" type="text">
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
                    <a href="add/addmember.html" class="tm-nav-link">
                        Add A Member
                        <i class="fas fa-3x fa-user-plus"></i>
                    </a>                
                </li>
                <li class="tm-nav-item">
                    <a href="../book/bookpage.html" class="tm-nav-link">
                        Books
                        <i class="fas fa-3x fa-book"></i>
                    </a>                
                </li>
                <li class="tm-nav-item">
                    <a href="../borrowdetails/borrowdetails.php" class="tm-nav-link">
                        Borrow Details
                        <i class="fas fa-3x fa-info"></i>

                    </a>               
                </li>
            </ul>
        </nav>
    
    </div>
    <div class="tm-container" style="margin-top:-50px; background-color:white; padding:30px">
     <?php
        $first_name = '';
        $last_name = '';
        $member_id = '';
        $contact_no = '';
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

        $sql = "SELECT * FROM `member`";

        if (!empty($_GET["first_name"])){
            $first_name = $_GET["first_name"];
        }
        if (!empty($_GET["last_name"])){
            $last_name = $_GET["last_name"];
        }

        if (!empty($_GET["member_id"])){
            $member_id = $_GET["member_id"];
        }

        if(isset($_GET["member_id"])){
            if($_GET["member_id"] == '0'){
            $member_id = $_GET["member_id"];
            }
        }

        if (!empty($_GET["contact_no"])){
            $contact_no = $_GET["contact_no"];
        }

        if(isset($_GET["contact_no"])){
            if($_GET["contact_no"] == '0'){
            $contact_no = $_GET["contact_no"];
            }
        }

        $inputs = 0;

        if ($first_name != "" || $last_name != "" || $member_id != "" || $contact_no != ""){
            $sql = $sql . " " . "WHERE";
            if($first_name != ""){
                $inputs++;
            }
            if($last_name != ""){
                $inputs++;
            }
            if($member_id != ""){
                $inputs++;
            }
            if($contact_no != ""){
                $inputs++;
            }
        }

        if ($first_name != ""){
            $sql = $sql . " " . "firstname = " . "\"" . $first_name . "\"";
            $inputs--;
            if($inputs != 0){
                $sql = $sql . " " . "AND";
            }
        }

        if ($last_name != ""){
            $sql = $sql . " " . "lastname = " . "\"" . $last_name . "\"";
            $inputs--;
            if($inputs != 0){
                $sql = $sql . " " . "AND";
            }
        }

        if ($member_id != ""){
            $sql = $sql . " " . "member_id = " . "\"" . $member_id . "\"";
            $inputs--;
            if($inputs != 0){
                $sql = $sql . " " . "AND";
            }
        }

        if ($contact_no != ""){
            $sql = $sql . " " . "contact = " . "\"" . $contact_no . "\"";
            $inputs--;
            if($inputs != 0){
                $sql = $sql . " " . "AND";
            }
        }

        echo "<p><b><center>Search Results:</center></b><p>\n";

        if( !isset($_GET["first_name"]) && !isset($_GET["last_name"]) && !isset($_GET["contact_no"]) && !isset($_GET["member_id"]) ){
            echo "";
        }
        else{

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                echo "<table style=\"margin-left:auto;margin-right:auto\">
					<tr>
						<th width='90'>Member ID</th>
						<th width='150'>First Name</th>
						<th width='150'>Last Name</th>
						<th width='50'>Gender</th>
						<th width='150'>Address</th>
						<th width='50'>Contact</th>
						<th width='80'>Type ID</th>
						<th width='100'>Year Level</th>
						<th width='100'>Status</th>
					</tr>";
                // output data of each row 
                while($row = $result->fetch_assoc()) {
                    echo "
						<tr>
							<td width='90' align=center>".$row["member_id"]."</td>
							<td width='150' align=center>".$row["firstname"]."</td>
							<td width='150' align=center>".$row["lastname"]."</td>
							<td width='50' align=center>".$row["gender"]."</td>
							<td width='150' align=center>".$row["address"]."</td>
							<td width='50' align=center>".$row["contact"]."</td>
							<td width='80' align=center>".$row["type_id"]."</td>
							<td width='100' align=center>".$row["year_level"]."</td>
							<td width='100' align=center>".$row["status"]."</td>
						</tr>";
                }
                echo "</table>";
            } 
            else {
                echo "<p><center>0 results</center></p>";
            }
        }
            

        $conn->close();
    ?>
    </div>

	<div class="tm-container" style="margin-top:-50px; background-color:white; padding:30px">
		<form class="form_style" action="delete/deletem.php">
			<center>
				<h3>Please confirm the Member ID you would like to delete.</h3>
				<h3>The record could not be recovered once deleted.</h3>
				<input type='number' id="member_id" name="member_id" placeholder="member_id" required><br>
				<button type="submitx">Confirm</button>
			</center>
		</form>
	</div>
	
	<div class="tm-container" style="margin-top:-50px; background-color:white; padding:30px">
		<form class="form_style" action="update/updatemember.php">
			<center>
				<h3>Please confirm the Member ID you would like to update.</h3>
				<input type='number' id="member_id" name="member_id" placeholder="member_id" required><br>
				<button type="submitx">Confirm</button>
			</center>
		</form>
	</div>
	<footer style="position:fixed; bottom:0"><p>Group 13</p></footer>
</body>
</html>