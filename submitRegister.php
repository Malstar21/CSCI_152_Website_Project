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
		$UserName = mysql_real_escape_string($_POST['uname']);
		$Pass = md5($_POST['psw']);
		$Email = mysql_real_escape_string($_POST['email']);
		$DOB = ($_POST['bday']);

		$select = "SELECT email FROM useraccounts WHERE email = '$Email'";
		$result = mysql_query($select, $conn);
		$data = mysql_fetch_array($result, MYSQL_NUM);

		if($data > 1) {
			$_SESSION['message'] = "This email is already being used";
		}
		else {
			$sql = "INSERT INTO useraccounts (UserName, Password, Email, Birthday) VALUES ('$UserName', '$Pass', '$Email', '$DOB')";
			$_SESSION['message'] = "Sign up successful";

			if(mysql_query($sql)) {
				echo "Records added";
			}
			else {
				echo "ERROR";
			}
		}
	}

	// just goes back to register page for now
	header("Location:http://localhost/registerPage.php")
?>
