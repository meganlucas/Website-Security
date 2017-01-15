<?php
//include auth.php file on all secure pages
include("auth.php");
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
<p>Here you can change your account settings, like username, password, .</p>

<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a></br></br>

</body>
</html>
