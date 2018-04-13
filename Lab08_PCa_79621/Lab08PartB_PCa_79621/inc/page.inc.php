<?php
class Page  {

function show_headers($title = "Book-O-Rama - New Book Entry"){
    ?>
    <!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1><?php echo $title; ?></h1>
    <?php
}

function show_content(){
    ?>
      <form action="Lab08PartB_PCA_79621.php" method="post">

        <fieldset>
        <p><label for="ISBN">ISBN</label>
        <input type="text" id="ISBN" name="ISBN" maxlength="13" size="13" /></p>

        <p><label for="Author">Author</label>
        <input type="text" id="Author" name="Author" maxlength="30" size="30" /></p>

        <p><label for="Title">Title</label>
        <input type="text" id="Title" name="Title" maxlength="60" size="30" /></p>

        <p><label for="Price">Price</label>
        $ <input type="text" id="Price" name="Price" maxlength="7" size="7" /></p> 
        </fieldset>

        <p><input type="submit" value="Add New Book" /></p>


        </form>
    <?php
}

function show_footer(){
    ?>
    </body>
    </html>
    <?php

}
}

?>