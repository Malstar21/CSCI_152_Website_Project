<!DOCTYPE HTML>
<?php
// start session
session_start();
?>

<html>
	<head>
		<title>Make A Story</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<style>
			input[type="submit"]{
				float: right;
			}

			divT {
				height: 200px;
				width: 400px;
				background: transparent;

				word-wrap: break-word;
				position: fixed;
				top: 20%;
				left: 55%;
				margin-top: -100px;
				margin-left: -200px;
			}

			divR {


				float:right;
				width:50%;
				height:500%;
				display:block;
				margin-top:136px;
			}

			divL {
				background: transparent;
				float:left;
				width:50%;
				height:50%;
				display:block;
				margin-top:70px;
			}

			div1 {
				height: 200px;
				width: 400px;
				background: transparent;

				top: 50%;
				left: 50%;
				margin-top: -100px;
				margin-left: -200px;
			}

			.box{
				width: 60px
				height: 40px
				background-color:green;
				border: solid 5px silver;

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

						<!-- dropdown navigation menu and its content-->
						<div class="dropdown-content">
							<! Menu bubbles>
							<li><a href="http://localhost/indexweb.php">Home </a></li>
							<li><a href="http://localhost/enterinfo.php">Make A Story</a></li>
							<li><a href="http://localhost/retrievestory.php">Stories</a></li>
							<li><a href="http://localhost/reading.html">Contact Us</a></li>	
							<?php
							if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
								echo '<li><a href="http://localhost/profilePage.php">Profile</a></li>';
								echo '<li><a class="menuDropText" href="http://localhost/logOut.php">Log Out</a></li>';
							}
							?>
						</div>
					</header>
			</div>
				<!-- Main -->
					<section id="main">
						<divT>
						<font size="5"> Create your own Story. </font>
						</divT>

						<divL>
						<form method='post' enctype="multipart/form-data" action=http://localhost/submitstory.php>
							<br />

							<label> Title: </label> <textarea rows="1" name="title" id="title"> </textarea>
							<label> Story: </label> <textarea rows="9" name="comment" id="comment"></textarea><br />
							
							<input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
							
							<label> Image: </label> <input type="file" name="image" />
							<input type='submit' value='Submit' name='submit' />
						</form>
						</divL>


						<divR>
						<!-- desription for the created your own story page -->
							<div class="box">
								<p> Ever had a cool/weird/funny story you've wanted to share? Well this is the place to do so! We will take your story and feature it as an interactive story
									for other users to fill in. Simply do so by typing your story into the box in the left.</p>
								<p> Simple Rules to follow:
										<ul>
												<li> Replace certain key words in your story with [ADJECTIVE], [VERB], [ETC.] </li>
												<li> Keep it age appropriate for our younger users. </li>
												<li> Don't make the story too long. </li>
												<li> Have fun! </li>

										</ul>
								</p>

							</div>
						</divR>

					</section>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
