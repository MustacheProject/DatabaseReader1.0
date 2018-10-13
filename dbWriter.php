<?php
echo "<br> Inside dbwriter <br>";
//include "bookRecord.php";
$sxml=simplexml_load_file($target_file)or die("Error: Cannot create object");
foreach ($sxml->children() as $book) {
  echo $book ['title'] . "<br>";
  foreach ($book->authors->children() as $author) {
    echo $author->name . "<br>";
    echo $author->surname . "<br>";
  }
  echo "<br><br>";
}
 ?>
