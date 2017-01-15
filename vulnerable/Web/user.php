<?php
require('db.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="user">
<div class="form2">
<p class="home2"><a href="index.php">Home</a></p>
<h2 align="center">View Snippets</h2>
<table class="table2" width="100%" border="0" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Username</strong></th>
<th><strong>Snippet</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$user=$_GET["user"];
$sel_query="SELECT submittedby, name, id from new_record WHERE submittedby='$user'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $row["submittedby"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</div>
</body>
</html>
