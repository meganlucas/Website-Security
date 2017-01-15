<?php
//include auth.php file on all secure pages
include("auth.php");
require("security.php");
require('db.php');
$username=  $_SESSION['username'];

?>
<html>
<head>
  <meta charset="utf-8">
  <title>Welcome Home</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="home">
    <div class="form">
      <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
      <p>You can see all of the images that you have uploaded on this page.</p>
      <img src=""></img></br>
      <?php
      $count=1;
      $sel_query="SELECT submittedby, file, id from images WHERE submittedby='".$username."'";
      $result = mysqli_query($con,$sel_query);
      while($row = mysqli_fetch_assoc($result)) { ?>
        <img height="120" width="120" src="<?php echo sanaitiseInput($row["file"]);
        ?>"></img>
        <?php $count++; } ?>
      </body>
      </html>
