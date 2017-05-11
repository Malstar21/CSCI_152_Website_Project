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

  if(isset($_POST["submit"]))
  {
    $story = $_POST['comment'];
    $id = $_SESSION['storyID'];
    $sql = "UPDATE makeastory SET story = '$story' WHERE id = '$id'";

    if(mysql_query($sql)) {
      echo "Records added";
    }
    else {
      echo "ERROR";
    }
  }

  header("Location:http://localhost/profilePage.php");
?>
