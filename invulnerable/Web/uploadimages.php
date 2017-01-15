<?php
require('token.php');

if (isset($_POST['fileToUpload'], $_POST['token'])) {
	$password = $_POST['fileToUpload'];

	if(!empty($fileToUpload)) {
		if(Token::check($_POST['token'])) {
		}
	}
	$token = new Token();
}
?>

<html>
<head>
<meta charset="utf-8">
<title>Upload Images</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<br />
</br>
<body>
	<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
  <div class="ting" align="center">
<p>You can upload images here!</p>
</br>
<form action="uploadimage.php" method="post" enctype="multipart/form-data">
    <p>Select image to upload:</p>
  </br>
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload Image" name="submit">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
</form>
<br /><br />
<a href="viewimages.php">View All of Your Images</a>
</div>>
</body>
</html>
