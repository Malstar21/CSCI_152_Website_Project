<?php
  $conn = mysql_connect("localhost", "root", "");
  mysql_select_db("seem website");

  if($conn == false) {
    die("connection failed");
  }

  // SELECT all messages that belong to sent user's ID
  // get retrieving user's ID, example replace 0 with user's ID
  // $id = 0
  $sql = "SELECT messageText FROM usermessage WHERE fromUserKey = 0";
  $result = mysql_query($sql);

  // fetch all messages for user
  while($row = mysql_fetch_array($result)) {
    echo $row['messageText'];
  }
?>
