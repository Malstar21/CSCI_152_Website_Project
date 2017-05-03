<!DOCTYPE HTML>
<!--
<?php
// start session
session_start();
?>
-->
<html>
	<head>
		<title>Contact Us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<style>
			input[type="submit"]{
				float: right;
			}
			div1 {
				height: 200px;
				width: 400px;
				background: transparent;

				position: fixed;
				top: 50%;
				left: 50%;
				margin-top: -100px;
				margin-left: -200px;
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

			.dropdown-content a:hover {background-color: #f1f1f1}

			.dropdown:hover .dropdown-content {
				display: block;
			}

			.dropdown:hover .dropbtn {
				background-color: transparent;
			}
</style>


	</head>

	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="dropdown"  >
				<button class="dropbtn">Menu</button>

				<!-- Header -->
					<header >

						<div class="dropdown-content">
							<! Menu bubbles>
							<li><a href="http://localhost/indexweb.php">Home </a></li>
							<li><a href="http://localhost/retrievestory.php">Stories</a></li>
							<li><a href="http://localhost/reading.php">Contact Us</a></li>
							<?php
							if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
								echo '<li><a href="http://localhost/enterinfo.php">Make A Story</a></li>';
								echo '<li><a href="http://localhost/profilePage.php">Profile</a></li>';
								echo '<li><a class="menuDropText" href="http://localhost/logOut.php">Log Out</a></li>';
							}
							?>
							
						<div>
					</header>
			</div>

				<!-- Main -->
					<section id="main">

						<div1>

							<form method='post' action=http://localhost/sendemail.php>

								<!-- desrciption for contact page -->
								<divDescription>
									<p>
										Have any questions, comments, or feedback on this site? Contact us and we'd be glad to assist you.
									</p>
								</div>



							  	NAME: <input type='text' name='name' id='name' /><br />

							  	Email: <input type='text' name='email' id='email' /><br />

							  	Comment:<br />

								<textarea name='comment' id='comment'></textarea><br />
							  	<input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
							  	<input type='submit' value='Submit' name='submit' id='send' />
								</form>

						</div1>

					</section>

			</div>
	</body>
</html>
