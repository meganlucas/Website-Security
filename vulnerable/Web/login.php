<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = $_POST['username'];
        //escapes special characters in a string
	$password = $_POST['password'];

	//Checking is user existing in the database or not
        $query = "SELECT * FROM users WHERE username='$username'
and password='".$password."'";
	$result = mysqli_query($con,$query) ;
	$rows = mysqli_num_rows($result);
    if($rows==1){
		$_SESSION['username'] = $username;
		header("Location: index.php");
     }else{
	echo "<div align='center' class='form3'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p class="title" align="center">Log In</p>
<form align="center" action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p align="center">Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<p align="center">See the website's latest snippets:</p></br>
<div id="table" align="center">
<table class="table2" width="30%" border="0" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Username</strong></th>
<th><strong>Snippet</strong></th>
<th><strong>See more:</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT submittedby, id, name FROM new_record WHERE id IN (SELECT MAX(id) FROM new_record GROUP BY submittedby)";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
	$id = $row["submittedby"];
	?>
<tr text-align="center"><td align="center"><?php echo $row["submittedby"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo "<a href='user.php?user=$id'>View all of ". $id ."'s Snippets</a><br>"?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<?php } ?>
</body>
</html>