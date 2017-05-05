go<?php
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

	// we need to get the user ID here
	$uid = 1;
	if(isset($_POST['submit'])) {
		$story = mysql_real_escape_string($_POST['comment']);
		$result = mysql_query ("UPDATE makeastory SET story = '$story' WHERE id = 43");
	}
	header("Location:http://localhost/successfulUpdateStory.html")
?>
