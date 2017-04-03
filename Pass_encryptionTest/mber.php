
<link rel="stylesheet" href="form.css">
<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <img src="<?= $_SESSION['avatar'] ?>"><br />
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "accounts_complete");
        $sql = "SELECT username, avatar FROM accounts";
        $result = $mysqli->query($sql); 
        ?>
        <div id='registered'>
        <span>All registered users:</span>
        <?php
        while($row = $result->fetch_assoc()){ 
            //echo '<pre>';
            //print_r($row);
            //echo '</pre>';
            echo "<div class='userlist'><span>$row[username]</span><br />";
            echo "<img src='$row[avatar]'></div>";
        }
        </div>
    </div>
</div>
