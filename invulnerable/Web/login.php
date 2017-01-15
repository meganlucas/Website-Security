<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
require('db.php');
require("security.php");
require('token.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['password'], $_POST['username'], $_POST['token'])) {
	$password = $_POST['password'];
	$username = $_POST['username'];

	if(!empty($password) && !empty($username)) {
		if(Token::check($_POST['token'])) {
		}
	}
	$token = new Token();
}

if (isset($_POST['username'])){
        // removes backslashes
	$username = sanitiseInput($_POST['username']);
	$username = sanitiseQuery($con, $username);
	$password = sanitiseInput($_POST['password']);
	$password = md5(sanitiseQuery($con, $password));
	//Checking is user existing in the database or not
    $query = "SELECT * FROM users WHERE username='".$username."'
and password='".$password."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div align='center' class='form3'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
		}
    } else{
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
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
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
	$id = sanitiseInput($row["submittedby"]);
	?>
<tr text-align="center"><td align="center"><?php echo sanitiseInput($row["submittedby"]); ?></td>
<td align="center"><?php echo sanitiseInput($row["name"]); ?></td>
<td align="center"><?php echo "<a href='user.php?user=$id'>View all of ".$id."'s Snippets</a><br>"?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<?php } ?>
</body>
</html>