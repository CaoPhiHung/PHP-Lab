<?php
 session_start();
 require_once("pdo.inc.php");
 require_once("page.inc.php");
 require_once("config.inc.php");
 require_once("productmapper.inc.php");
 
 $page = new page();

 if($_SESSION && $_SESSION['loggedin'] == true ){
    $page->header();
    echo "<h1>Show cart</h1>";
    $cart = new productmapper();
    $products = $cart->getCart();
    $page->show_all_carts($products);
    $page->footer();
 }else{
    $page->Redirect("../Lab10_PCa_79621.php");
 }

?>

