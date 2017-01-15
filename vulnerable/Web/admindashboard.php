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
<div class="home">
<div class="form2">
  <table align="center" class="table2" width="90%" border="0" style="border-collapse:collapse;">
  <thead>
  <tr>
  <th align="center"><strong>Username</strong></th>
  <th align="center"><strong>Admin Status </br>(1 if yes, 0 if no)</strong></th>
  <th align="center"><strong>Change Admin Status</strong></th>
  </tr>
  </thead>
  <tbody>
<?php
$count=1;
$sel_query="SELECT admin, username, id from users WHERE id";
$result = mysqli_query($con,$sel_query);
?>
    <p align="center">Welcome to the admin dashboard <?php echo $_SESSION['username']; ?>!</p>
    <p>Because you're an admin, you can make other people admins or remove their admin status: </p><?php
    while($row = mysqli_fetch_assoc($result)) {?>
<tr><td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["admin"]; ?></td>
<td align="center"><a href="updateadmin.php?name=<?php echo $row["username"]; ?>">Make/Revoke Admin</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a></br></br>
<br /><br />

<br /><br />
</div>
</body>
</html>
