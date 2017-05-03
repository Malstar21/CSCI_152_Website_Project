<!DOCTYPE HTML>
<!--

<?php
// start session
session_start();
?>
-->
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<style>
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
							<li><a href="http://localhost/enterinfo.html">Make A Story</a></li>
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
					<?php
						$dbhost = "localhost";
						$user = "root";
						$password = "";
						$db = "seem website";

						$conn = mysql_connect($dbhost, $user, $password);
						mysql_select_db($db);

						if ($conn == false) {
							die("Connection failed");
						}

						$sql = "SELECT * FROM makeastory ORDER BY RAND() LIMIT 8";

						$result = mysql_query($sql, $conn);
						$story1 = mysql_fetch_assoc($result);
						$story2 = mysql_fetch_assoc($result);
						$story3 = mysql_fetch_assoc($result);
						$story4 = mysql_fetch_assoc($result);
						$story5 = mysql_fetch_assoc($result);
						$story6 = mysql_fetch_assoc($result);
						$story7 = mysql_fetch_assoc($result);


					?>

					<section id="main">
						<header>
							<div>
								<p align="center"; style="font-family:verdana;font-size:30px">
									<b><i>~ STORIES ~</i></b>
								</p>
							</div>
						</header>
						<!-- Thumbnails for home page -->
							<section class="thumbnails">
								<div id="div1">
									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story1['id'] ?>">
										<!-- <img src="images/thumbs/pbj.jpg" alt="" /> </a> -->
										<?php echo '<img src="data:image;base64,'.$story1['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story1['id'] ?>" class="button"> <?php echo $story1['title'] ?></a>

									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story2['id'] ?>" >
										<!-- <img src="images/thumbs/olddog.jpg" alt="" /> -->
										<?php echo '<img src="data:image;base64,'.$story2['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story2['id'] ?>" class="button"> <?php echo $story2['title'] ?> </a>
									</a>
								</div>

								<div>
									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story3['id'] ?>">
										<?php echo '<img src="data:image;base64,'.$story3['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story3['id'] ?>" class="button"> <?php echo $story3['title'] ?> </a>
									</a>
									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story4['id'] ?>">
										<?php echo '<img src="data:image;base64,'.$story4['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story4['id'] ?>" class="button"> <?php echo $story4['title'] ?> </a>
									</a>
									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story5['id'] ?>">
										<?php echo '<img src="data:image;base64,'.$story5['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story5['id'] ?>" class="button"> <?php echo $story5['title'] ?> </a>
									</a>
								</div>

								<div>
									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story6['id'] ?>">
										<?php echo '<img src="data:image;base64,'.$story6['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story6['id'] ?>" class="button"> <?php echo $story6['title'] ?> </a>
									</a>
									<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story7['id'] ?>">
										<?php echo '<img src="data:image;base64,'.$story7['image'].'">'; ?> </a>
										<a href="http://localhost/displaytemplate.php?rowid=<?php echo $story7['id'] ?>" class="button"> <?php echo $story7['title'] ?> </a>
									</a>
								</div>

							</section>

					</section>

				<!-- Footer -->
					<footer id="footer">

					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
