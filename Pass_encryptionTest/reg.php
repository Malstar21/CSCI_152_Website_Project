<!doctype html>
<html>
<head>
<title>Register Now!</title>
</head>
<body>

<h3>Registration Form</h3>
<form name="form1" action="" method="post">
Username: <input type=text name="u1"><br/>
Password: <input type=password name="p1"><br/>

<input type="submit" name="submit1" name='Register'>
</form>

<?php
if(isset($_POST["submit1"]))
{
$pwd=md5($_POST["p1"]);
mysql_connect("localhost","root","");
mysql_select_db("md5_password");
mysql_query("insert into registration values('$_POST[u1]','$pwd')");
    
    
}




?>

</body>
</html>
