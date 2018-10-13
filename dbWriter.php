<?php
include_once "dbconnection.php";
$sxml=simplexml_load_file($target_file)or die("Error: Cannot create object");

//going through the title
foreach ($sxml->children() as $book) {
  $book_title=$book ['title'];
  //SQL command to insert the title in the DB
  $sql = "INSERT INTO Books (Title) VALUES ('$book_title')";
  //Check if insert is successfully
  if ($conn->query($sql) === TRUE) {
    //get ID of last book inserted
     $last_book_id=mysqli_insert_id($conn);
} else {
    echo "Error on book insertion: " . $sql . "<br>" . $conn->error;
}
//Going through each author of the book
  foreach ($book->authors->children() as $author) {
    $author_name= $author->name;
    $author_last_name= $author->surname;
    //SQL command to insert author in the DB
    $sql = "INSERT INTO Author (Name, Last_name) VALUES ('$author_name','$author_last_name')";
    //Check if insert is successfully
    if ($conn->query($sql) === TRUE) {
      //get ID of last book inserted
       $last_author_id =mysqli_insert_id($conn);
  } else {
      echo "Error on author insertion: " . $sql . "<br>" . $conn->error;
  }

   //SQL command to create the relation in relation DB
     $sql = "INSERT INTO Relation (Book_ID, Author_ID) VALUES ('$last_book_id','$last_author_id')";
     //Check if insert is successfully
     if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
   } else {
       echo "Error on relation insertion: " . $sql . "<br>" . $conn->error;
   }
  }
  ;
}
 ?>
