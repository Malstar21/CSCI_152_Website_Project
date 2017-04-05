<?php
	session_start();
	$_SESSION['message'] = '';

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
		$Email = mysql_real_escape_string($_POST['email']);
		$Pass = md5($_POST['psw']);
		//ECHO $Email;
		//ECHO $Pass;
		$select = "SELECT email, UserName, Password FROM useraccounts WHERE email = '$Email'";
		$result = mysql_query($select, $conn);
		//$row = mysql_fetch_assoc($result);
		$row = mysql_fetch_assoc($result);
		echo $row['Password'];

		// while($row = mysql_fetch_assoc($result)) {
		// 	echo $row['email'];
		// 	echo $row['Password'];
		// }
		//$data = mysql_fetch_array($result, MYSQL_NUM);

		// If there is an email match then compare passwords
		if($row['Password'] == $Pass) {
			//If password matches login to profilePage
			header("Location: http://localhost/profilePage.php");
 			exit;
		}
		else {
			// If email not found return an error
			$_SESSION['message'] = "Email and/or Password is incorrect";
			header("Location:http://localhost/loginPage.php");
		}
	}

	// just goes back to register page for now

?>
