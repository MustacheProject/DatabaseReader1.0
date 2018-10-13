<?php
$target_dir = "/opt/lampp/htdocs/DatabaseReader1.0/uploads/";
$file_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br />";
echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br />";
echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " Kb<br />";
echo "Stored in: " . $_FILES["fileToUpload"]["tmp_name"] . "<br />";

move_uploaded_file ( $_FILES["fileToUpload"]["tmp_name"] , "$target_dir$file_name" );


include_once "dbWriter.php";
?>
