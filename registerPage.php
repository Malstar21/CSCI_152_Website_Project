<!DOCTYPE HTML>
<?php
  session_start();
  if(empty($_SESSION['message'])) {
    $_SESSION['message'] = "";
  }
?>

<html>
<link href="http://more-sky.com/data/out/9/IMG_352169.jpg" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="registrationform.css" type="text/css">

<!-- check if password matches -->
<script language='javascript' type='text/javascript'>
    function confirmPassword() {
			var pass = document.getElementById('psw');
			var passConfirm = document.getElementById('psw_confirm');
        if (pass.value != passConfirm.value) {
            //input.setCustomValidity('Password Must be Matching.');
						passConfirm.setCustomValidity("Passwords Don't Match");
						//window.alert("password needs to match");
        } else {
            // input is valid -- reset the error message
            passConfirm.setCustomValidity("");
        }
    }
</script>

<style>

	.lgt {
		color: white;
		text-align:center;
	}

	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}

	.submitbtn {
		width: auto;
		padding: 10px 18px;
		background-color: gray;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	.dropbtn {
		background-color: transparent;
		color: white;
		padding: 0px;
		font-size: 25px;
		border: none;
		cursor: pointer;
	}

	.dropdown {
		position: relative;
		display: inline-block;
		padding: 0 2em;
	}

	.dropdown-content {
		display: none;
		color: white;
		font-size: 20px;
		position: absolute;
		list-style-type: none;
		background-color: gray;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}

	.dropdown-content a {
		color: white;
		font-size: 20px;
		padding: 12px 16px;
		text-decoration: none;

		display: block;
	}

	.dropdown-content a:hover {
		background-color: #f1f1f1
	}

	.dropdown:hover .dropdown-content {
		display: block;
	}

	.dropdown:hover .dropbtn {
		background-color: transparent;
	}

	.menuDropText {
		font-size: 20pt;
		border-bottom: dotted 1px rgba(255, 255, 255, 0.35);
		padding: 12px 16px;
		line-height: 1.65;
	}

	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 100%;
		}
	}

  label.labelColor {
    color: black ;
  }
</style>

<body>
  <div id="wrapper" class="dropdown"  >
    <button class="dropbtn">Menu</button>

    <!-- Header -->
    <header>

      <div class="dropdown-content">

        <li><a class="menuDropText" href="http://localhost/indexweb.php">Home </a></li>
        <li><a class="menuDropText" href="http://localhost/enterinfo.html">Make A Story</a></li>
        <li><a class="menuDropText" href="http://localhost/retrievestory.php">Stories</a></li>
        <li><a class="menuDropText" href="http://localhost/reading.html">Contact Us</a></li>
      </div>
    </header>
  </div>

<div class="body-content">
  <div class="module">
    <h1>Welcome! Register Now!</h1>
    <form class="form" action=http://localhost/submitRegister.php method="post" enctype="multipart/form-data" autocomplete="off">

      <div class="alert alert-error"> <?php echo $_SESSION['message']; ?> </div>

      <input type="text" placeholder="UserName" name="uname" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="psw" id="psw" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="psw_confirm" id="psw_confirm" autocomplete="new-password" required />

      <label for="age" class="labelColor"><b>Enter Birthday</b></label>
      <input type="date" name="bday" id="bday" required>

      <div class="avatar"><label><b>Select your avatar: </b></label><input type="file" name="avatar" accept="image/*" required /></div>
      <button type="submit" value="Register" name="submit" class="btn btn-block btn-primary" onclick=confirmPassword()> submit </button>
      <span class="psw">Have an account? <a href="http://localhost/loginPage.php">Login in</a></span>

    </form>
  </div>
</div>
</body>

</html>
