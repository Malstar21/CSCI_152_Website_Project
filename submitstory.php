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
	echo "connected";
	
	if(isset($_POST['submit'])) {
		$insertTitle = mysql_real_escape_string($_POST['title']);
		$insertStory = mysql_real_escape_string($_POST['comment']);
		$image = addslashes($_FILES['image']['tmp_name']);
		$image_name = addslashes($_FILES['image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		$sql = "INSERT INTO makeastory (story,image,imagename, title) VALUES ('$insertStory', '$image', '$image_name', '$insertTitle') ";
		
		if(mysql_query($sql)) {
			echo "Records added";
		}
		else {
			echo "ERROR";
		}
	}
	header("Location:http://localhost/enterinfo.html")
?>