<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>
<h3>Login Now</h3>
<form name="form1" action="" method="post">
Username: <input type=text name="u2"><br/>
Password: <input type=password name="p2"><br/>
<input type="submit" name="submit1" name='Login'><br>
<div id="d1" style="color:#FF0000"></div>
</form>

<?php
if(isset($_POST["submit1"]))
{
$pwd=md5($_POST["p2"]);
mysql_connect("localhost","root","");
mysql_select_db("md5_password");
$res=mysql_query("select * from registration where Username='$_POST[u2]' && Password='$pwd'");
while($row=mysql_fetch_array($res))
{
?>
<script type="text/javascript">
window.location="mber.php";
</script>  
<?php           
}  
  
?>
<script type="text/javascript">
document.getElementById("d1").innerHTML="Bad username or password";
</script>
<?php
  
}

?>
</body>
</html>
