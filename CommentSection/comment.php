<html>
<form action="" method="post">

  <label> Name: <br><input type="text"= name="name"></br></label>
  <label> Comment: <br><textarea cols="45" rows="5" name="mes"></textarea></br></label>
  <input type="submit" name="post" value="Post">

</form>
</html>

<?php

$name = $_POST["name"];
$text = $_POST["mes"];
$post = $_POST["post"];

if($post){

#WRITE DOWN COMMENTS

$write = fopen("com.txt", "a+");
frwite($write, "<u><b> $name</b></u><br>$text<br>");
fclose($write);

#DISPLAY COMMENTS


}

?>
