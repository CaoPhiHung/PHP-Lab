<?php

class productmapper {

 private $dbConnection;

 function __construct() {
  $this->dbConnection = new PDOAgent("mysql",DBUSER,DBPASSWD,DBSERVER,DB);
  
 }

 function __destruct(){
  $this->dbConnection->disconnect();
 }

 public function getProducts(){
    $arr = array();
    $dbConnection = $this->dbConnection;
    $dbConnection->connect();
    $bindParams = [];
    $results = $dbConnection->query("select id, product, price from products order by product asc;", $bindParams);
    foreach($results as $record){
        $line = new stdClass;
        $line->id = $record->id;
        $line->product = $record->product;
        $line->price = $record->price;
        $arr[] = $line;  
    }
    return $arr;
 }

 public function removeProductInCart($id){
    $dbConnection = $this->dbConnection;
    $dbConnection->connect();
    $bindParams = [$_SESSION['userid'],$id];
    $results = $dbConnection->query("DELETE from carts 
    WHERE userid = ? and productid = ?;", $bindParams);
 }

 public function addToCart() {
  $id = intval($_GET["id"]);
  $dbConnection = $this->dbConnection;
  $dbConnection->connect();
  $bindParams = [$_SESSION['userid'],$id];
  $results = $dbConnection->query("INSERT INTO carts (userid, productid, modifieddate) VALUES (?,?,NOW());", $bindParams);
 }
 
 public function getCart(){ 
  $cartArray = array();
  $dbConnection = $this->dbConnection;
  $dbConnection->connect();
  $bindParams = [$_SESSION['userid']];
  $results = $dbConnection->query("SELECT carts.productid, userid, products.product, count(productid) as count, products.price
        FROM `carts` , products 
        WHERE userid = ? and products.id = carts.productid
        GROUP BY userid, productid;", $bindParams); 

    if($dbConnection->rowcount >= 1){
        foreach($results as $record){
            $line = new stdClass;
            $line->id = $record->productid;
            $line->product = $record->product;
            $line->count = $record->count;
            $line->total = $record->count * $record->price; 
            $cartArray[] = $line; 
        }
    }
    return $cartArray; 
 } 

 private function getProductData($id) {
    $dbConnection = $this->dbConnection;
    $dbConnection->query( "SET NAMES 'UTF8'" );
    $statement = $dbConnection->prepare( "select product, price from products where id = ? limit 1" );
    $statement->bind_param( 'i', $id);
    $statement->execute();
    $statement->bind_result( $product, $price);
    $statement->fetch();
    $line = new stdClass;
    $line->product = $product; 
    $line->price = $price;
    $statement->close();
    return $line;
 }
 
 }
?>