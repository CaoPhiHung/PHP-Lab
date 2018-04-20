<?php
include 'inc/conn.inc.php';
//Update record in database
 
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];
 
$query = "UPDATE `books` 
            SET `Author`='$author' ,
                `Title`='$title',
                `Price`='$price' 
             WHERE   `ISBN`='$isbn'";


if ($connection->query($query)) {
       $msg = array("status" =>1 , "msg" => "Record Updated successfully");
}else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
 
 
$json = $msg;
 
header('content-type: application/json');
echo json_encode($json);
 
@mysqli_close($conn);