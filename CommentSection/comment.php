<html>

 <head>
<!-- Added the href comment.css-->
  <link rel="stylesheet" href="comment.css" type="text/css">
 </head>

 <body>

  <form action="" method="POST">



  <div class="container">
      <form>
        <div class="form-group">
          <label> Name:
           <input type="text" name="Name" class="Input" style="width: 220px" required>
          </label>
          <textarea class="form-control status-box" rows="3" placeholder="Enter your comment here..."></textarea>
        </div>
      </form>
      <div class="button-group pull-right">
        <p class="counter">250</p>
        <a href="#" class="btn btn-primary">Submit Your Comment!</a>
      </div>
      <ul class="posts">
      </ul>
    </div>
    </form>
 </body>

</html>


<?php

 if($_POST['Submit'])
 {
  print "<h1>Thanks for your thoughts!</h1>";

  $Name = $_POST['Name'];
  $Comment = $_POST['Comment'];

  #Get old comments
  $old = fopen("comment.txt", "r+t");
  $old_comments = fread($old, 1024);

  #delete and write down new
  $write = fopen("comment.txt", "w+");
  $string = "<b>".$Name."</b><br>".$Comment."<br>\n".$old_comments;
  fwrite($write, $string);
  fclose($write);
  fclose($old);
 }

 #read the comments
 $read = fopen("comment.txt", "r+t");
 echo "<br><br>All Comments<hr>".fread($read, 1024);
 fclose($read);

?>
