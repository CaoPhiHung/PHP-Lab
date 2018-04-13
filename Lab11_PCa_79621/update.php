<?php
include 'conn.php';
//Update record in database
 
$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$customerid = $_POST['customerid'];
 
$query = "UPDATE `customers` 
            SET `Name`='$name' ,
                `address`='$address' 
                WHERE  `CustomerID`='$customerid'";


if ($connection->query($query)) {
       $msg = array("status" =>1 , "msg" => "Record Updated successfully");
}else {
    echo "Error: " . $query . "<br>" . mysqli_error($connention);
}
 
 
$json = $msg;
 
header('content-type: application/json');
echo json_encode($json);
 
@mysqli_close($conn);