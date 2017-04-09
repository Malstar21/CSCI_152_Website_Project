<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    // connect to server
    $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("seem website");

    // if connection failed display connection failed
    if ($conn == false)
      die("Connection failed");

    // start session
    session_start();

    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
      // welcome to profile page
    }
    else {
      // user must login first before accessing profile page
      header("Location: loginFirst.html");
      exit;
    }
  ?>

    <meta charset="utf-8">

    <title>People card with Tabs - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">


        /* USER PROFILE PAGE */
 .card {
    margin-top: 20px;
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:50px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:50px;

    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;
}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-info .card-title {
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #262626;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}

body {
		background-color: #000;
		background-image: url("images/bg.jpg");
		background-size: cover;
		background-position: top center;
		width:100%;
        margin-left:25%;
        margin-right:25%;
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


<!-- Friends list background -->
div.background {
    background: url("images/bg.jpg") repeat;
    border: 2px solid black;
}

div.transbox {
    margin: 30px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.6;
    filter: alpha(opacity=60);
}

div.transbox p {
    margin: 5%;
    font-weight: bold;
    color: #000000;
}





    </style>



    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	</head>


<body style ="text-align:left" class>

<div id="wrapper"  class="dropdown"  >
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

<div class="col-lg-6 col-sm-6" >
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="images/headerbg.jpg">
        </div>

        <div class="useravatar">
            <img src="images/avatar.png" alt="" />
        </div>

        <div class="card-info"> <span class="card-title"> <?php echo $_SESSION['userName'] ?> </span>
        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Stories</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Friends</div>
            </button>
        </div>

		<div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <div class="hidden-xs">Messages</div>
            </button>
        </div>

		<div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab5" data-toggle="tab"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <div class="hidden-xs">Settings</div>
            </button>
        </div>
    </div>

   <div class="well">
	<div class="tab-content">

		<!-- this is the section for the first tab in profile page-->
        <div class="tab-pane fade in active" id="tab1">
          <h3>Your Stories <span class="glyphicon glyphicon-pushpin"></span></h3>
          <?php
            // this will be where we get the unique user id and pull there stories
        	  // from makeastory database
        	  $id = $_SESSION['userID'];
        	  $sql = "SELECT title, id, userKey FROM makeastory WHERE userKey=$id";

            // get query
            $result = mysql_query($sql);

            // this will display titles of stories that belong to that user account
            // using example link for now
            $num = 1;
            while($row = mysql_fetch_array($result))
            {
              echo $num;
              echo ". ";
              echo "<a href='http://localhost/displaytemplate.php?rowid={$row['id']}'> <b> {$row['title']} </b> </a>";
              echo "<br>";
              $num++;
            }
        ?>
        </div>
		<!-- section for button panes on profile page (crossbar)
			also includes the titles for the actual tabs when clicked
		-->

        <div class="tab-pane fade in" id="tab2">
          <h3>Favorited Stories
			<span class="glyphicon glyphicon-thumbs-up"></span>
		  </h3>
        </div>

        <div class="tab-pane fade in" id="tab3">
          <h3>Friend List
			<span class="glyphicon glyphicon-globe"></span>
			<div class="background">
				<div class="transbox">
					<p> This is where the list of friends will go</p>
					<p> stuff</p>
					<p> stuff</p>
					<p> stuff</p>
					<p> stuff</p>
					<p> stuff</p>
					<p> stuff</p>
				</div>
			</div>

		  </h3>

		</div>

		<div class="tab-pane fade in" id="tab4">
          <h3>Messages
			<span class="glyphicon glyphicon-inbox"></span>
		  </h3>
		</div>

		<!--Section for account settings -->
		<div class="tab-pane fade in" id="tab5">
          <label>
			<span class="glyphicon glyphicon-camera" aria-hidden="true" style="color:black"></span> Profile Picture: </label>
			<input type="file" name="image" />
			<input type='submit' value='Submit' name='submit' />
			<div>
				<label>
					<span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:black"></span>Change Name:
				</label>
				<div>
					<input type="text" placeholder="New Name?" name="pname">
					<button type "submit">Submit</button>
				</div>
				<label><span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:red"></span>Delete Profile?:  </label>
				<div>
					<button onclick="Delete()">DELETE!</button>
				</div>
			</div>
        </div>
    </div>
   </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below
    $(this).removeClass("btn-default").addClass("btn-primary");
});
});

function Delete(){
	confirm("Deleting Profile")
}
</script>

</body>
</html>
