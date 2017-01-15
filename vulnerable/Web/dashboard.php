<?php
require('db.php');
include("auth.php");
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
<div class="form">
<p>Welcome to Dashboard.</p>
<p><a href="insert.php">Insert Snippet</a></p>
<p><a href="view.php">View Snippets</a><p>
<p><a href="profile.php">Edit Profile</a><p>
<p><a href="uploadimages.php">Upload Images</a></p>
</div>
</body>
</html>
