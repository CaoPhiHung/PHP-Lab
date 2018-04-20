<?php


$url = "http://localhost:8080/dev/PHP-Lab/Lab11_PCa_79621/jsonposttest.php";
// $data = '{"CustomerID":"3","Name":"Michelle Arthur","Address":"357 North Road","City":"Yarraville"}';
$data = '';
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

var_dump($response);

?>
