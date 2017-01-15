<?php
require('db.php');
require("auth.php");
require("security.php");
require('token.php');

if (isset($_POST['admin'], $_POST['token'])) {
	$admin = $_POST['admin'];

	if(!empty($admin)) {
		if(Token::check($_POST['token'])) {
    }
	}
	$token = new Token();
}

if (isset($_POST['submit']) && $_POST['submit'] == 'Submit'){

  $query = "UPDATE `register`.`users` SET ";

  $name = sanitiseInput($_GET['name']);
  $username =  sanitiseInput($_SESSION['username']);
  $admin = sanitiseInput($_POST['admin']);



  $sel_query="UPDATE users SET admin=IF(LENGTH('$admin')=0, admin, '$admin') WHERE username='$name'";
  $result = mysqli_query($con, $sel_query);


  if (!$result) {
    echo "Failed to update.";
  }
  else {
      echo "successful change. <br> redirecting to admin dashboard ...";
      //$_SESSION['id'] = mysqli_insert_id($conn);

      // Send user to landing page
      header("Location: admindashboard.php");
      exit;
  }
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Update Admin Status</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div align="center" class="admin">
    <p><a href="dashboard.php">Dashboard</a>
      | <a href="logout.php">Logout</a></p>
      <h1>Hi <?php
      $username =  sanitiseInput($_SESSION['username']);
      echo $username ?></h1>
      <p>Here you can make <?php $name = $_GET['name']; echo $name?> an admin or remove <?php $name = sanitiseInput($_GET['name']); echo $name?>'s admin status</p>

      <form name="form5" method="post" >
          <select id="admin" name="admin">
          <option value="1">Admin</option>
          <option value="0">Not an Admin</option>
          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
          </select>
        </br>
        </br>
          <input name="submit" type="submit" value="Submit" />
      </form>
    </div>
  </body>
  </html>
