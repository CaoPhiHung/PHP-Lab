<?php


//Required Files
require('inc/config.inc.php');
require('inc/pdo.inc.php');
require('inc/page.inc.php');
require('inc/loginmapper.inc.php');

//Create the page
$p = new Page();

//Create the Customer Mapper
$lm = new loginmapper();

//Insert the Page Header
$p->header();


if (!empty($_POST))  {
    
    //Verify the post data
    if (empty($_POST['userID']))  {
        $p->addLoginForm();
        echo '<DIV CLASS="alert alert-danger">You have not entered the appropriate login details.<br/>
        Please go back and try again.</DIV> ';
        exit;
    } else {

        $loggedin = $lm->check_used_login($_POST);
        if($loggedin){
            $_SESSION['loggedin'] = $loggedin;
            echo '<DIV CLASS="alert alert-success">Login successfull!</DIV>';
        }else{
            echo '<DIV CLASS="alert alert-danger">Sorry for login was not successfull.</DIV> ';
            $p->addLoginForm();
        }
        
    }
}else{
    $p->addLoginForm();
}

$p->footer();


?>