
<!DOCTYPE HTML>
<!--

-->
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<style>
			.dropbtn {
				background-color: transparent;
				color: white;
				padding: 0px;
				font-size: 25px;
				border: none;
				cursor: pointer;
			}

			.dropdown {
				position: relative;
				display: inline-block;
			}

			.dropdown-content {
				display: none;
				color: white;
				font-size: 20px;
				position: absolute;
				list-style-type: none;
				background-color: gray;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}

			.dropdown-content a {
				color: white;
				font-size: 20px;
				padding: 12px 16px;
				text-decoration: none;

				display: block;
			}

			.dropdown-content a:hover {background-color: #f1f1f1}

			.dropdown:hover .dropdown-content {
				display: block;
			}

			.dropdown:hover .dropbtn {
				background-color: transparent;
			}
</style>


	</head>

	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="dropdown"  >
				<button class="dropbtn">Menu</button>

				<!-- Header -->
					<header >

						<div class="dropdown-content">
							<! Menu bubbles>
							<li><a href="http://localhost/indexweb.php">Home </a></li>
							<li><a href="http://localhost/enterinfo.html">Make A Story</a></li>
							<li><a href="http://localhost/retrievestory.php">Stories</a></li>
							<li><a href="http://localhost/reading.html">Contact Us</a></li>
							<li><a href="http://localhost/profilePage.php">Profile</a></li>
						</div>
					</header>
			</div>
	</body>
	</html>

<?php
	$dbhost = "localhost";
	$user = "root";
	$password = "";
	$db = "seem website";
	
	$conn = mysql_connect($dbhost, $user, $password);
	mysql_select_db($db);
	
	if ($conn == false) {
	die("Connection failed");
	}
	
	$sql = "SELECT * FROM makeastory";
	
	$result = mysql_query($sql, $conn);
	if(!$result)
	{
		echo 'could not run query';
	}
		
	echo "
	<br> <br> <br>
	<table border='1'>
	<tr>
	<th>Stories</th>
	</tr>
	";
	
	// Gets everything in table
	while($row = mysql_fetch_assoc($result))
	{
		echo "<tr>";	
		echo "<td> <a href='http://localhost/displaytemplate.php?rowid={$row['id']}'> {$row['title']}";
		//echo '<img src="data:image;base64,'.$row['image'].' height="100" width="100" "> </a> </td>';
		echo "</tr>";
	}
	mysql_close($conn);
	?>

