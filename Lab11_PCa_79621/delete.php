<?php
include 'inc/conn.inc.php';
//Delete record from database
 
$id = $_POST['id'];
 
$query = "DELETE FROM books WHERE `ISBN`='$id';";

if ($connection->query($query)) {
    $msg = array("status" =>1 , "msg" => "Record Deleted successfully");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
} 
 
$json = $msg;
 
header('content-type: application/json');
echo json_encode($json);
 
@mysqli_close($conn);

?>