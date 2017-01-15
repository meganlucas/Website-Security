<?php
require('db.php');
require("auth.php");
require("security.php");
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$submittedby = sanitiseInput($_SESSION["username"]);
$datetime = date("Y-m-d H:i:s");
$directory = $target_file;
$file_loc = $_FILES["fileToUpload"]["tmp_name"];
$file_size = $_FILES['fileToUpload']['size'];
 $file_type = $_FILES['fileToUpload']['type'];
 $file = rand(1000,100000)."-".$_FILES["fileToUpload"]["tmp_name"];
 // new file size in KB
 $new_size = $file_size/1024;
 // new file size in KB

 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case

 $final_file=str_replace(' ','-',$new_file_name);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($file_loc, $target_file)) {
         $sql="INSERT INTO images(submittedby,file,type,size) VALUES('$submittedby','$target_file','$file_type','$new_size')";
        mysqli_query($con,$sql)
        or die(mysql_error());
        ?>
        <script>
 alert('successfully uploaded');
       window.location.href='index.php?success';
       </script>
       <?php
    } else { ?>
      <script>
 alert('error while uploading file');
       window.location.href='index.php?fail';
       </script>
       <?php
    }
}
?>
