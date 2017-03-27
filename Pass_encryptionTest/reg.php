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

    
}


<link rel="stylesheet" href="registrationform.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Welcome! Register Now!</h1>
    <form class="form" action="registrationform.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div> 
      <input type="text" placeholder="UserName" name="username" />
      <input type="email" placeholder="Email" name="email" />
      <input type="password" placeholder="Password" name="password" />  
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>