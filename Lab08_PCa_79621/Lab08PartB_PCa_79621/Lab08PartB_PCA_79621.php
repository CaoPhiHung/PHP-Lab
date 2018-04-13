<?php
require("inc/page.inc.php");
require("inc/BookController.inc.php");
$p = new Page();
$p ->show_headers();
if(!empty($_POST)){
    //Set the header
    
    $bookController = new BookController();
    $bookController->insertBook($_POST);
    
}else{
//Print the roster Summary
$p->show_Content();
}

$p->show_footer();
?>