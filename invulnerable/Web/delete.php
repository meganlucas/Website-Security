<?php
	require("security.php");
	require('db.php');

	$id = sanitiseInput($_REQUEST['id']);
	$id = sanitiseQuery($con, $id);
	$query = "DELETE FROM new_record WHERE id='".$id."'";
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: view.php");
	exit();
?>
