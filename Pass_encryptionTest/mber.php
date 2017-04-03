
<link rel="stylesheet" href="form.css">
<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert"><?= $_SESSION[''] ?></div>
        <img src="<?= $_SESSION['avatar'] ?>"><br />
        Welcome <span class="user"><?= $_SESSION['user'] ?></span>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "accounts_complete");
       
        $sql = "SELECT username, avatar FROM accounts";
        $result = $mysqli->query(sql); 
    
        ?>
  
        <span>All registered users:</span>
        <?php
        while($row = $result->fetch_assoc()){ 
            echo '<pre>';
            print(row);
            echo '</pre>';
            echo "<div class='userlist'><span>$row[user]</span><br />";
            echo "<img src='$row[avatar]'></div>";
        }
        ? 
        </div>
    </div>
</div>
