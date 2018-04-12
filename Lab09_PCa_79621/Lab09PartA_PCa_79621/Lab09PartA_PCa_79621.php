<?php


//Required Files
require('inc/config.inc.php');
require('inc/pdo.inc.php');
require('inc/page.inc.php');
require('inc/customer.inc.php');
require('inc/customermapper.inc.php');

//Create the page
$p = new Page();

//Create the Customer Mapper
$cm = new customermapper();

//Insert the Page Header
$p->header();

$p->addCustomerForm();
if (!empty($_POST))  {
    
    //Verify the post data
    if ( empty($_POST['name']) 
        || empty($_POST['address'])
        || empty($_POST['city']) )  {

        echo '<DIV CLASS="alert alert-danger">You have not entered the appropriate customer details.<br/>
        Please go back and try again.</DIV> ';
        
        exit;
    } else {

        //We have the right data, lets go ahead and add the customer via the customer mapper
        $newid = $cm->create($_POST);
        
        //Display a message to the user that the customer has been created
        echo '<DIV CLASS="alert alert-success">New Customer '.$newid.' has been created!</DIV>';
    }
}else if(!empty($_GET) && isset($_GET["deleteID"])){
    // var_dump($_GET["deleteID"]);
    $cm->delete($_GET["deleteID"]);
}

$customer_list = $cm->get_customer_list();
$p->show_customers($customer_list);

$p->footer();


?>