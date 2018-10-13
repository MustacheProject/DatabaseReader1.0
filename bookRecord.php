<?php
//TO FIX
include "author.php";
class bookRecord{
  $author author;
  public var $book_title;

  function bookRecord ($new_author, $new_book_title){
    $this->$author=$new_author;
    $this->book_title=$new_book_title;
  }
}
 ?>
