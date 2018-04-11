<?php
 session_start();
 require_once("pdo.inc.php");
 require_once( "config.inc.php" );
 require_once( "productmapper.inc.php" );
 $cart = new productmapper();
 $action = strip_tags( $_GET["action"] );
 switch ($action) {
  case "add":
   $cart->addToCart();
   break;
 }
?>