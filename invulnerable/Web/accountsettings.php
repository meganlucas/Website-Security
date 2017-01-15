<?php
//include auth.php file on all secure pages
	require("auth.php");
	require("security.php");
	require('db.php');
	$username = sanitiseInput($_SESSION['username']);
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
<p>Welcome <?php echo $username; ?>!</p>
<p>Here you can change your account settings, like username, password, .</p>

<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a></br></br>

</body>
</html>
