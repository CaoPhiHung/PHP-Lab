<?php
 session_start();
 require_once("inc/config.inc.php");
 require_once("inc/pdo.inc.php");
 require_once("inc/productmapper.inc.php");
 require_once("inc/page.inc.php");
 require_once("inc/loginmapper.inc.php");
?>

  <?php
   $cart = new productmapper();
   $lm = new loginmapper();
   $page = new page();
   $page->header();

    if(!empty($_GET)){
      if($_GET['action'] == 'logout'){
        session_destroy();
        $page->Redirect("Lab10_PCa_79621.php");
      }
    }

    

   if (!empty($_POST))  {
    if (empty($_POST['userID']) && empty($_SESSION))  {
      $page->addLoginForm();
      echo '<DIV CLASS="alert alert-danger">You have not entered the appropriate login details.<br/>
      Please go back and try again.</DIV> ';
      exit;
    } else {
      $loggedin = $lm->check_used_login($_POST);
      if($loggedin){
        $_SESSION['loggedin'] = $loggedin;
        $_SESSION['userid'] = $_POST['userID'];
        $products = $cart->getProducts();
        $page->show_all_products($products);
      }else{
        echo '<DIV CLASS="alert alert-danger">Sorry for login was not successfull.</DIV> ';
        $page->addLoginForm();
      }
    }
  }else if(!empty($_SESSION) && $_SESSION['loggedin'] == true){
    $products = $cart->getProducts();
    $page->show_all_products($products);
  }else{
    
    $page->addLoginForm();
  }
   $page->footer();

  ?>
  
</body>
</html>