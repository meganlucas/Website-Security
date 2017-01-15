<?php
//include auth.php file on all secure pages
include("auth.php");
require('db.php');
$username=  $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="home">
<div class="form">
<p><font size="50" color="black">Welcome <?php echo $_SESSION['username']; ?>! </font> </p>
<p>This is a secure area.</p>
<br /><br />
<a href="viewimages.php">View All Images</a>
<form action="uploadimage.php" method="post" enctype="multipart/form-data">
    Select image to upload:
  </br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<br /><br />

</div>
</body>
</html>
