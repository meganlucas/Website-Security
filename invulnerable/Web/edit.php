<?php
	require('db.php');
	require("security.php");
	require("auth.php");
	require("token.php");

	$id = sanitiseInput($_REQUEST['id']);
	$id = sanitiseQuery($con, $id);
	$query = "SELECT * from new_record where id='".$id."'";
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
if (isset($_POST['name'], $_POST['token'])) {
	$username = sanitiseInput($_POST['name']);

	if(!empty($name)) {
		if(Token::check($_POST['token'])) {
		}
	}
	$token = new Token();
}
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
| <a href="insert.php">Insert New Record</a>
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=sanitiseInput($_REQUEST['id']);
$id = sanitiseQuery($con, $id);
$trn_date = date("Y-m-d H:i:s");
$name = sanitiseInput($_REQUEST['name']);
$name = sanitiseQuery($con, $name);
$age = sanitiseInput($_REQUEST['age']);
$age = sanitiseQuery($con, $age);
$submittedby = sanitiseInput($_SESSION["username"]);
$submittedby = sanitiseQuery($con, $submittedby);
$update= "update new_record set trn_date='".$trn_date."',
name='".$name."'submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
<p><input type="text" name="name" placeholder="Enter Snippet"
required value="<?php echo $row['name'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
