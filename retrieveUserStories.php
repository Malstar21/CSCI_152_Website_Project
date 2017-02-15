<?php
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("seem website");

	// if connection failed display connection failed
	if ($conn == false)
		die("Connection failed");

	// this will be where we get the unique user id and pull there stories
	// from makeastory database
	$id =0;
	$sql = "SELECT title, id, userKey FROM makeastory WHERE userKey=$id";

	$result = mysql_query($sql);

	// this will display titles of stories that belong to that user account
	// using example link for now
	$num = 1;
	while($row = mysql_fetch_array($result))
	{
		echo $num;
		echo ". ";
		echo "<a href='http://localhost/displaytemplate.php?rowid={$row['id']}'> <b> {$row['title']} </b> </a>";
		echo "<br>";
		$num++;
	}
?>
