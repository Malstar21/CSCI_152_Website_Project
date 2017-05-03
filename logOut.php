<?php
  // start session
  session_start();

  $_SESSION['loggedIn'] = false;
  $_SESSION['userPicture'] = "";
  $_SESSION['userName'] = "";
  $_SESSION['userID'] = "";
  echo '<meta http-equiv="refresh" content="5;url=loginPage.php" />';

  echo '<h1  align="center"> You are now logged out </h1>';
  echo '<h3 align="center"> redirecting you to login page in 5 seconds </h3>';
?>
