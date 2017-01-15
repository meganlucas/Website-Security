<?php
require('db.php');
include("auth.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'Change') {

    $query = "UPDATE `register`.`users` SET ";

    $icon = $_POST['icon'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    if ($icon != "") {
        $query = $query."`profile_icon`='". $icon."',";
    }



    // may need to variables
    // $query = "UPDATE `hello`.`users` SET `email`='". mysqli_real_escape_string($conn, $_POST['email']) ."', `username`='". mysqli_real_escape_string($conn, $_POST['username']) . "', `password`='". md5($_POST['password']) . "' WHERE `email`='hello@gmail.com';";
    // $query = "UPDATE `register`.`Users` SET `email`='". $email."', `profile_icon`='". $icon."', `homepage`='". $home."', `password`='". $password . "' WHERE `username`='". $_SESSION['username']."';";
     $query = "UPDATE `register`.`users` SET username=IF(LENGTH('$username')=0, username, '$username'), profile_icon=IF(LENGTH('$icon')=0, profile_icon, '$icon'), password=IF(LENGTH('$password')=0, password, '$password') WHERE `username`='". $_SESSION['username']."';";

    //echo $query;

    $retval = mysqli_query($con, $query);


    if (!$retval) {
        echo "Failed to update.";
    } else {
        $_SESSION['username'] = $username;
        echo "successful login. <br> redirecting to home page...";
        //$_SESSION['id'] = mysqli_insert_id($conn);

        // Send user to landing page
        header("Location: index.php");
        exit;
    }



}

?>

<<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>j</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
 <ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>

<link rel="stylesheet" href="css/style.css" />

<form class="form4" method="post">
    <input type="username" name="username" id="username" placeholder="new username"/>
    <input type="password" name="password" id="password" placeholder="new password"/>
    <input type="text" name="icon" id="icon" placeholder="URL of profile image"/>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
    <input type="submit" name="submit" value="Change">
</form>

