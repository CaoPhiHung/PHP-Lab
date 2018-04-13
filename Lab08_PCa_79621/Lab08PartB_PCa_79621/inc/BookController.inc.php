<?php
class BookController {

  function checkPostValid(){
    if (!isset($_POST['ISBN']) || !isset($_POST['Author']) 
         || !isset($_POST['Title']) || !isset($_POST['Price'])) {
       echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
       return false;
    }
    return true;
  }

  function insertBook($postData){
    // create short variable names
      $isbn=$_POST['ISBN'];
      $author=$_POST['Author'];
      $title=$_POST['Title'];
      $price=$_POST['Price'];
      $price = doubleval($price);

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "books";

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO Books (ISBN, Author, Title, Price)
          VALUES ('".$isbn."', '".$author."', '".$title."', ".$price.")";
          $conn->exec($sql);
          echo  "<p>Book inserted into the database.</p>";
          }
      catch(PDOException $e)
          {
            echo "<p>An error has occurred.<br/>
            The item was not added.</p>" . "<br>" . $e->getMessage();
          }

      $conn = null;
          }
        }

  ?>
