<?php
	require("auth.php");
	require("security.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="form" align="center">
<p><strong>Welcome to the Dashboard</strong></p></br>
<p><a href="insert.php">Insert Snippet</a></p>
<p><a href="view.php">View Snippets</a><p>
<p><a href="profile.php">Edit Profile</a><p>
<p><a href="uploadimages.php">Upload Images</a></p>
<?php
$username =  sanitiseInput($_SESSION['username']);
$sel_query="SELECT admin, username, id from users WHERE username='$username'";
$result = mysqli_query($con,$sel_query);
$row2 = mysqli_fetch_assoc($result);
if($row2["admin"] == 1){ ?>
<p><a href="admindashboard.php">Admin Dashboard</a></p>
<?php  }
?>
</div>
</body>
</html>
