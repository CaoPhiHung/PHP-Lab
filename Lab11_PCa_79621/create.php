<?php
include 'conn.php';
 
$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
 
$sql = "INSERT INTO `books`.`customers` (`Name`, `Address`, `City`) VALUES ('$name', '$address','$city');";
 
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