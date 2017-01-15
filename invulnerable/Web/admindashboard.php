<?php
//include auth.php file on all secure pages
  include("auth.php");
  require("security.php");
  require('db.php');
  $username =  sanitiseInput($_SESSION['username']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="home" align="center">
<?php
$count=1;
$username = sanitiseInput($_SESSION['username']);
$sel_query="SELECT admin, username, id from users";
$result = mysqli_query($con,$sel_query);
$sel_query2="SELECT admin, username, id from users WHERE username='$username'";
$result2 = mysqli_query($con,$sel_query2);
$row2 = mysqli_fetch_assoc($result2);
  if($row2["admin"] == 1){ ?>
  </br>  <p align="center">Welcome to the admin dashboard <?php echo $username; ?>!</p>
    <p><a href="dashboard.php">Dashboard</a></p>
    <a href="logout.php">Logout</a></br></br>
    <p>Because you're an admin, you can make other people admins or remove their admin status: </p>
    <div class="form6">
      <table align="center" class="table2" width="90%" border="0" style="border-collapse:collapse;">
      <thead>
      <tr>
      <th align="center"><strong>Username</strong></th>
      <th align="center"><strong>Admin Status </br>(1 if yes, 0 if no)</strong></th>
      <th align="center"><strong>Change Admin Status</strong></th>
      <th align="center"><strong>Edit User's Profile</strong></th>
      </tr>
      </thead>
      <tbody><?php
    while($row = mysqli_fetch_assoc($result)) {
      $admin_status=$row["admin"];?>
<tr><td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["admin"]; ?></td>
<td align="center"><a href="updateadmin.php?name=<?php echo $row["username"]; ?>">Make/Revoke Admin</a>
<td align="center"><a href="updateprofileadmin.php?name=<?php echo $row["username"]; ?>">Edit <?php echo sanitiseInput($row["username"])?>'s Profile</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<?php }
else {
  echo "<p>you are not an admin</p>";
}
?>
<br /><br />

<br /><br />
</div>
</body>
</html>
