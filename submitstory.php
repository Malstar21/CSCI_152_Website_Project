<?php
	session_start();
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

		$key = $_SESSION['userID'];	// get user's ID

		$sql = "INSERT INTO makeastory (story,image,imagename, title, userKey) VALUES ('$insertStory', '$image', '$image_name', '$insertTitle', '$key') ";

		if(mysql_query($sql)) {
			echo "Records added";
		}
		else {
			echo "ERROR";
		}
	}
	header("Location:http://localhost/enterinfo.html")
?>
