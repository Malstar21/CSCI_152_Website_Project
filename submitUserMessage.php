<?php
  // this file will send a message to the database
  // which will hold user ID and friend ID to be pulled
  $conn = mysql_connect("localhost", "root", "");
  mysql_select_db("seem website");

  if ($conn == false) {
    die("Connection failed");
  }

  // Here will need to get user ID and friends ID to send to
  if(isset($_POST['submit'])) {
    // GET USER ID
    // GET FRIEND ID
    $insertTitle = mysql_real_escape_string($_POST['messageTitle']);
    $insertMessage = mysql_real_escape_string($_POST['messageText']);
    $sql = "INSERT INTO usermessage (fromUserKey, toUserKey,messageTitle,messageText) VALUES ('0', 1,'$insertTitle', '$insertMessage')";
  }

  if(mysql_query($sql)) {
    echo "Records added";
  }
  else {
    echo "ERROR";
  }

 ?>
