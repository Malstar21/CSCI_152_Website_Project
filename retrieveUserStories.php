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
	
	$id =1;
	$sql = "SELECT id FROM makeastory WHERE id=$id";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		echo $row['id'];
	}
  ?>
