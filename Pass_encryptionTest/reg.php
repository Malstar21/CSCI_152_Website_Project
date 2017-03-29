<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost','root','','regusers');

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        
        //post variable for username 
        $username = $mysqli->real_escape_string($_POST['username']);
        //post variable for email
        $email = $mysqli->real_escape_string($_POST['email']);
        //md5 and post variable for password 
        $password = md5($_POST['password']); 
        //post variable for avatar
        //store files to images folder
        $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
        //check to see if image is the same type 
        if (preg_match("!image!",$_FILES['avatar']['type'])) {
            
            //copy images to $avatar_path and the path is (('images/'.$_FILES['avatar']['name']))
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
                
                //session variables to be used on server 
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;

                //insert user data into database
                $sql = "INSERT INTO accounts (username, email, password, avatar) "
                        . "VALUES ('$username', '$email', '$password', '$avatar_path')";
                
                //if login and reg successful, take them to welcome php 
                if ($mysqli->query($sql) === true){
                    //$username is variable for register user
                    $_SESSION['message'] = "Registration succesful! $username has registered, Welcome!";
                    header("location: member.php");
                }
                //however if failed, display error message that account couldnt be made 
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                //end
                $mysqli->close();          
            }//dispaly error message if file type not the same
            else {
                $_SESSION['message'] = 'File upload failed!';
            }
        }
        else {
            $_SESSION['message'] = 'This isnt a picture!';
        }
    }
    //check for that both are same passwords, if not, dispaly error 
    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>
<link href="http://more-sky.com/data/out/9/IMG_352169.jpg" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="registrationform.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Welcome! Register Now!</h1>
    <form class="form" action="registrationform.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div> 
      <input type="text" placeholder="UserName" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
