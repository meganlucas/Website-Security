<?php
require('db.php');
require("auth.php");
require("security.php");
require('token.php');

if (isset($_POST['icon'], $_POST['token'])) {
	$admin = $_POST['icon'];

	if(!empty($icon)) {
		if(Token::check($_POST['token'])) {
    }
	}
	$token = new Token();
}

if (isset($_POST['submit']) && $_POST['submit'] == 'Change') {

    $query = "UPDATE `register`.`users` SET ";

    $icon = $_POST['icon'];
    $password = md5($_POST['password']);
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con,$username);

    if ($icon != "") {
        $query = $query."`profile_icon`='". $icon."',";
    }



    // may need to variables
    // $query = "UPDATE `hello`.`users` SET `email`='". mysqli_real_escape_string($conn, $_POST['email']) ."', `username`='". mysqli_real_escape_string($conn, $_POST['username']) . "', `password`='". md5($_POST['password']) . "' WHERE `email`='hello@gmail.com';";
    // $query = "UPDATE `register`.`Users` SET `email`='". $email."', `profile_icon`='". $icon."', `homepage`='". $home."', `password`='". $password . "' WHERE `username`='". $_SESSION['username']."';";

     $query = "UPDATE `register`.`users` SET profile_icon=IF(LENGTH('$icon')=0, profile_icon, '$icon') WHERE `username`='". $_SESSION['username']."';";

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

<link rel="stylesheet" href="css/style.css" />

<form class="form4" method="post">
    <input type="text" name="icon" id="icon" placeholder="URL of profile icon"/>
    <input type="submit" name="submit" value="Change">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
</form>
