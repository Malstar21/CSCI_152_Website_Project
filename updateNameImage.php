<?php
  // start session
  session_start();

  function checkIfImageUpdated($check, $id)
  {
    if($check != null) {
      $sql = "UPDATE useraccounts SET ProfilePicture = '$check' WHERE ID = '$id'";

      if(mysql_query($sql)) {
        // update user's image
        $_SESSION['userPicture'] = $check;
        return "Records added";
      }
      else {
        return "ERROR";
      }
    }
    else {
      return "nothing to submit";
    }
  }

  function checkIfNameUpdated($check, $id)
  {
    if($check != null) {
      $sql = "UPDATE useraccounts SET UserName = '$check' WHERE ID = '$id'";

      if(mysql_query($sql)) {
        // update user's name
        $_SESSION['userName'] = $check;
        return "Records added";
      }
      else {
        return "ERROR";
      }
    }
    else {
      return "nothing to submit";
    }
  }

  // Connect to Database
	$conn = mysql_connect('localhost', 'root', '');
	mysql_select_db('seem website');

	if ($conn == false) {
		die("Connection failed");
	}
	echo "connected";

  if(isset($_POST['submitNameImage'])) {
    $updateImage = addslashes($_FILES['image']['tmp_name']);
    $updateImage = file_get_contents($updateImage);
    $updateImage = base64_encode($updateImage);
    $updateName = mysql_real_escape_string($_POST['pname']);

    $id = $_SESSION['userID'];

    // image to update
    checkIfImageUpdated($updateImage, $id);
    checkIfNameUpdated($updateName, $id);

    // if($updateImage != null) {
    //   $sql = "UPDATE useraccounts SET ProfilePicture = '$updateImage' WHERE ID = '$id'";
    //
    //   if(mysql_query($sql)) {
    //     echo "Records added";
    //     // update user's image
    //     $_SESSION['userPicture'] = $updateImage;
    //   }
    //   else {
    //     echo "ERROR";
    //   }
    // }
    // else {
    //   echo "nothing to submit";
    // }

    // name to update
    // if($updateName != null) {
    //   $sql = "UPDATE useraccounts SET UserName = '$updateName' WHERE ID = '$id'";
    //
    //   if(mysql_query($sql)) {
    //     echo "Records added";
    //     // update user's name
    //     $_SESSION['userName'] = $updateName;
    //   }
    //   else {
    //     echo "ERROR";
    //   }
    // }
    // else {
    //   echo "nothing to submit";
    // }
  }

  // just goes back to register page for now
  header("Location:http://localhost/profilePage.php")
?>
