<!DOCTYPE HTML>
<?php
session_start();
 ?>
<html>
	<script>
		var ni;
		var ai;
		var vi;
		var bi;
		var pi;
		var numi;
		var foi;
		var MEi;

		function displayTextBoxes(para)
		{
			//var String=str.substring(str.lastIndexOf(":")+1,str.lastIndexOf(";"));

			var n = (para.split("[NOUN]").length-1);
			var a = (para.split("[ADJ]").length-1);
			var v = (para.split("[VERB]").length-1);
			var b = (para.split("[BODYPARTS]").length-1);
			var p = (para.split("[PLACE]").length-1);
			var num = (para.split("[NUMBER]").length-1);
			var fo = (para.split("[FOOD]").length-1);
			var ME = (para.split("[").length-1);

			//var STRING1 = para.substring(para.lastIndexOf("[") + 1, para.lastIndexOf("]"));

			var STRING2;
			var STRING2_START;
			var STRING2_END;
			var word;

			ni = n;
			ai = a;
			vi = v;
			bi = b;
			pi = p;
			numi = num;
			foi = fo;
			MEi = ME;

			var ix = 0;
			var iy = 0;
			var iz = 0;
			var ib = 0;
			var ip = 0;
			var inum = 0;
			var ifo = 0;
			var iME = 0;

			var container = document.getElementById("container");

			STRING2 = para;
		while(ME != 0)
		{
			var input = document.createElement("input");
			input.type = "text";
			input.id = "tag" + iME;
			container.appendChild(input);


			STRING2_START = STRING2.indexOf('[') + 1;
			STRING2_END = STRING2.indexOf(']', STRING2_START);

			word = STRING2.substring(STRING2_START, STRING2_END);
			STRING2 = STRING2.substring(STRING2_END, STRING2.length);

			//container.appendChild(word);
			container.innerHTML = container.innerHTML + word

			ME--;
			iME++;
		}


		container.innerHTML = container.innerHTML + "<input type='submit' value='Submit' name='btn' onclick='displayStory();'>"
		}
</script>
	<head>
		<title>Template Display</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main1.css" />
		<link rel="stylesheet" href="assets/css/button.css" />

		<style>
			input[type="submit"]{

				float: right;
			}

			html,body {
				overflow: auto;
			}

			.container, .contents {
				height: 800px;
				overflow: auto;
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
				height: 400px;
				width: 800px;
				background: transparent;

				position: fixed;
				top: 35%;
				left: 30%;
				margin-top: -72px;
				margin-left: 400px;
			}

			divL {
				height: 400px;
				width: 800px;
				background: transparent;

				position: fixed;
				top: 35%;
				left: 29%;
				margin-top: -100px;
				margin-left: -400px;
			}

			.box {
				width: 45%;
				height: 80%;
				background-color: black;
				border: solid 3px silver;

				position: fixed;
				margin-top: 5%;
				margin-left: 25%;
			}

			divD {
				height: 200px;
				width: 400px;
				background: transparent;

				position: fixed;
				top: 75%;
				left: 50%;
				margin-top: -100px;
				margin-left: -200px;
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

			.dropdown-content a:hover {
				background-color: #f1f1f1
			}

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

							if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false) {
								echo '<li><a href="http://localhost/loginPage.php">Log In</a></li>';
							}
							?>
						<div>
					</header>
			</div>
				<!-- Main -->
				<div class="box">

<p>
  <a href="#" title="Love it" class="btn btn-counter" data-count="0"><span>&#x2764;</span> Love it</a>
</p>
				<ul>
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
					$rowid = $_GET['rowid'];

					$sql = "SELECT story FROM makeastory WHERE id = $rowid";

					$result = mysql_query($sql, $conn);
					$grab = mysql_fetch_assoc($result);

					if(!$result)
					{
						echo 'could not run query';
					}
					?>

				<form name="displayForm id= displayForm" method="post" class="textareaStyle">
					<div id="container"/>
					<script>displayTextBoxes("<?php echo ($grab['story']); ?>") </script>


				</form>


				</li>
				</div>

			</div>

	</body>

	<!-- Scripts -->
			<script>

			function displayStory() {

			var n = ni;
			var a = ai;
			var v = vi;
			var b = bi;
			var p = pi;
			var num = numi;
			var fo = foi;
			var ME = MEi;

			var para = <?php echo json_encode($grab['story']); ?>;

			var ix = 0;
			var iy = 0;
			var iz = 0;
			var ib = 0;
			var ip = 0;
			var inum = 0;
			var ifo = 0;
			var iME = 0;

			var STRING2 = para;
			var STRING_START;
			var STRING_END;
			var word;

			while(ME != 0)
			{
				var ele = document.getElementById('tag' + iME).value;

				STRING2_START = STRING2.indexOf('[') + 1;
				STRING2_END = STRING2.indexOf(']', STRING2_START);

				word = STRING2.substring(STRING2_START, STRING2_END);
				STRING2 = STRING2.substring(STRING2_END, STRING2.length);

				para = para.replace("[" + word + "]", ele)
				ME--;
				iME++;
			}


			container.innerHTML = para;

		}

		</script>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.poptrox.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/button.js"></script>
    
</html>
