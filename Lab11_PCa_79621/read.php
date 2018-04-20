<?php
include 'inc/conn.inc.php';
//Select data from database
 
 
$getData = "select * from books";
$qur = $connection->query($getData);

while($r = mysqli_fetch_assoc($qur)){
$msg[] = array("ISBN" => $r['ISBN'], 
    "Author" => $r['Author'],
    "Title" => $r['Title'], 
    "Price" => $r['Price']);
}


$json = $msg;
 
header('content-type: application/json');
echo json_encode($json);
 
@mysqli_close($conn);
 
?>