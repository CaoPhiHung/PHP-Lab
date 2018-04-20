 
<?php

$msg = $_POST;
$json = $msg;

 header('content-type: application/json');
 foreach($_POST as $key => $value)  {
     $json =  $key;
 }

$data = json_decode($json);
echo $json;
?>