<?php
  $conn = mysql_connect("localhost", "root", "");
  mysql_select_db("seem website");

  if($conn == false) {
    die("connection failed");
  }

  // SELECT all messages that belong to retrieving user's ID
  // get retrieving user's ID, example replace 0 with user's ID
  // $id = 0
  // when user inputs name search account table for user's account ID
  $sql = "SELECT messageText FROM usermessage WHERE toUserKey = 0";
  $result = mysql_query($sql);

  // fetch all messages for user
  while($row = mysql_fetch_array($result)) {
    echo $row['messageText'];
  }
?>
