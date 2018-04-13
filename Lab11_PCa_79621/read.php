<?php
include 'conn.php';
//Select data from database
 
 
$getData = "select * from customers";
$qur = $connection->query($getData);
 
while($r = mysqli_fetch_assoc($qur)){
 
$msg[] = array("CustomerID" => $r['CustomerID'], 
    "Name" => $r['Name'],
    "Address" => $r['Address'], 
    "City" => $r['City']);
}


$json = $msg;
 
header('content-type: application/json');
echo json_encode($json);
 
@mysqli_close($conn);
 
?>