<?php
include 'inc/conn.inc.php';
 
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];
 
$sql = "INSERT INTO books (`ISBN`, `Author`, `Title`, `Price`) VALUES ('$isbn', '$author','$title',$price);";
 
if ($connection->query($sql)) {
$msg = array("status" =>1 , "msg" => "Your record inserted successfully");
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
 
$json = $msg;
 
header('content-type: application/json');
echo json_encode($json);
 
 
@mysqli_close($conn);
 
?>