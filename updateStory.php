<!DOCTYPE HTML>
<html>
	<head>
		<title>Update story</title>
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
			
			/* Popup container - can be anything you want */
			.popup {
				position: relative;
				display: inline-block;
				cursor: pointer;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}

			/* The actual popup */
			.popup .popuptext {
				visibility: hidden;
				width: 160px;
				background-color: #555;
				color: #fff;
				text-align: center;
				border-radius: 6px;
				padding: 8px 0;
				position: absolute;
				z-index: 1;
				bottom: 125%;
				left: 50%;
				margin-left: -80px;
			}

			/* Popup arrow */
			.popup .popuptext::after {
				content: "";
				position: absolute;
				top: 100%;
				left: 50%;
				margin-left: -5px;
				border-width: 5px;
				border-style: solid;
				border-color: #555 transparent transparent transparent;
			}

			/* Toggle this class - hide and show the popup */
			.popup .show {
				visibility: visible;
				-webkit-animation: fadeIn 1s;
				animation: fadeIn 1s;
			}

			/* Add animation (fade in the popup) */
			@-webkit-keyframes fadeIn {
				from {opacity: 0;} 
				to {opacity: 1;}
			}

			@keyframes fadeIn {
			from {opacity: 0;}
			to {opacity:1 ;}
			}
			
			br {
				margin:2em 0;/* FF for instance */
				line-height:1em;/* chrome for instance */
			}
		</style>
	</head>

	<!-- BEGIN BODY OF HTML -->
	<body style ="text-align:left" >
		<!-- Wrapper -->
			<div id="wrapper" class="dropdown"  >
				<button class="dropbtn">Menu</button>
				<!-- Header -->
					<header >
						<!-- dropdown navigation menu and its content-->
						<div class="dropdown-content">
							<! Menu bubbles>
							<li><a href="http://localhost/indexweb.php">Home </a></li>
							<li><a href="http://localhost/enterinfo.html">Make A Story</a></li>
							<li><a href="http://localhost/retrievestory.php">Stories</a></li>
							<li><a href="http://localhost/reading.html">Contact Us</a></li>	
						</div>
					</header>
			</div>
			
				<!-- Main -->
					<section id="main">
						<?php

							$conn = mysql_connect("localhost", "root", "");
							mysql_select_db("seem website");

							// if connection failed display connection failed
							if ($conn == false)
								die("Connection failed");

							// will need to get the user's ID here
							$idu = 43;

							$result = mysql_query("SELECT story FROM makeastory WHERE id = $idu");
							$row = mysql_fetch_array($result);
						?>
						
						<divT>
						<font size="5"> Update Your Created Story</font>
						</divT>

						<divL>
						<form method='post' enctype="multipart/form-data" action=<!-- replace the action for pulling story-->
							<br />

							<label> Edit Your Story: </label> <textarea rows="9" name="comment" id="comment"><?php echo $row['story'] ?></textarea><br />
							<input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
							
							<!--<label> Image: </label> <input type="file" name="image" />-->
							<input type='submit' value='Submit' name='submit' />
						</form>
						</divL>


						<divR>
						<!-- desription for the created your own story page -->
							<div class="box">
								<!--<p> Ever had a cool/weird/funny story you've wanted to share? Well this is the place to do so! We will take your story and feature it as an interactive story
									for other users to fill in. Simply do so by typing your story into the box in the left.</p>
								<p> Simple Rules to follow:
										<ul>
												<li> Replace certain key words in your story with [ADJECTIVE], [VERB], [ETC.] </li>
												<li> Keep it age appropriate for our younger users. </li>
												<li> Don't make the story too long. </li>
												<li> Have fun! </li>

										</ul>
								</p>-->
								
							<body style="text-align:center">
								<h2>Edit Your Story</h2>
								<p>Same Rules Apply, if you need help </p>
								<div class="popup" onmouseover="myFunction()">Hover over me to view the Rules!
									<span class="popuptext" id="myPopup">
												<p1> Replace certain key words in your story with [ADJECTIVE], [VERB], [ETC.] </p1><br>
												<p2> Keep it age appropriate for our younger users. </p2><br>
												<p3> Don't make the story too long. </p3<br>
												<p4> Have fun! </p4>
									</span>
								</div>

								<script>
								// When the user clicks on div, open the popup
								function myFunction() {
									var popup = document.getElementById("myPopup");
									popup.classList.toggle("show");
								}
								</script>

							</body>
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
