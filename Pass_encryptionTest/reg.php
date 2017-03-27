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
    
    //do we need sessions to use for server side? 
}

//end php 
?> 
<!-- added background image and linked the css to reg.php-->
<link href="http://more-sky.com/data/out/9/IMG_352169.jpg" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" href="registrationform.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Welcome! Register Now!</h1>
    <!-- had to make them 'required' also action was reg.php not registrationform.php-->
    <form class="form" action="reg.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div> 
      <input type="text" placeholder="UserName" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <!-- had to make a confirm password to display on registration page on website-->
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
