<?php
require('db.php');
include("auth.php");
$name=$_GET['name'];
$query = "SELECT * from new_record where name='$name'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$username=  $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Update Record</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="form">
    <p><a href="dashboard.php">Dashboard</a>
      | <a href="logout.php">Logout</a></p>
      <h1>Hi <?php echo $username ?></h1>
      <p>Here you can make <?php echo $name?> an admin or remove <?php echo $name?>'s admin status</p>

<form name="form5" method="post">
  <select id="admin" name="admin">
  <option value="1">Admin</option>
  <option value="0">Not an Admin</option>
</select>
<p><input name="submit" type="submit" value="Submit" /></p>
<?php if($_POST['submit'] && $_POST['submit'] != 0)
{
   $admin=$_POST['admin'];
   $sel_query="UPDATE users SET admin='$admin' WHERE username='$name'";
   $result = mysqli_query($con, $sel_query);
}
  if (!$result) {
      echo "Failed to update.";
  }

?>
        </form>
      </div>
    </body>
    </html>
