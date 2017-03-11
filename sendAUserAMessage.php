<?php
  $conn = mysql_connect("localhost", "root", "");
  mysql_select_db("seem website");

  if($conn == false) {
    die("connection failed");
  }

  // Will need to get who's sending the message?
  // to then be stored in database
  if(isset($_POST["send"])) {
    // from user
    $toUser = ($_POST["toUser"]);
    $message = ($_POST["message"]);

    mysql_query("INSERT INTO usermessage (toUserKey, messageText) VALUES ('$toUser', $message)");
  }
?>
