<?php

class Page {

    //Attributes
    private $title = "Lab 10 - PCa_79621";

    function header() { ?>
        <html xmlns = "http://www.w3.org/1999/xhtml">
        <head>
        <title><?php echo $this->title; ?></title>
        <meta http-equiv = "Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="inc/js/main.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        </head>
        <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0">
        <!-- <h1>Products list</h1> -->
        <DIV CLASS="container">
        <DIV CLASS="jumbotron"><H1><?php echo $this->title; ?></H1></DIV>

    <?php }

    function show_all_products($products) { ?>
        <br /><a href="Lab10_PCa_79621.php?action=logout" title="go to cart">Log Out</a>
        <table cellpadding="5" cellspacing="0" border="0">
        <tr>
            <td style="width: 200px"><b>Product</b></td>
            <td style="width: 300px" colspan="2"><b>Price</b></td>
        </tr>
        <?php
            foreach($products as $product) {
        ?>
            <tr>
            <td><?php print HtmlSpecialChars($product->product); ?></td>
            <td>$<?php print $product->price; ?></td>
            <td style="text-align: center"><span style="cursor:pointer;" class="addToCart" data-id="<?php print $product->id; ?>">add to cart</span></td>
            </tr>
        <?php 
            } 
        ?>
        </table>
        <br /><a href="inc/show-cart.inc.php" title="go to cart">Go to cart</a>

    <?php }

function show_all_carts($products) { ?>
    <table cellpadding="5" cellspacing="0" border="0">
   <tr>
    <td style="width: 200px"><b>Product</b></td>
    <td style="width: 200px"><b>Count</b></td>
    <td style="width: 200px"><b>Total</b></td>
    <td style="width: 200px"><b>Delete</b></td>
   </tr>
   <?php
    foreach($products as $product){
   ?>
    <tr>
     <td><?php print HtmlSpecialChars($product->product); ?></td>
     <td><?php print $product->count; ?></td>
     <td>$<?php print $product->total; ?></td>
     <td><?php echo "<a href='show-cart.inc.php?action=delete&id=$product->id'>Delete</a>" ?></td>
    </tr>
   <?php 
    }
   ?>
  </table>
  <br /><a href="../Lab10_PCa_79621.php" title="go back to products">Go back to products</a>

<?php }

    function addLoginForm() { ?>

        <FORM METHOD="POST" ACTION="">
        <DIV>
        <h1> Login Now!</h1>
        </DIV>
        <DIV CLASS="form-group">
            <LABEL FOR="userID">UserID</LABEL>
            <INPUT TYPE="text" CLASS="form-control" NAME="userID" ID="userID" ARIA-DESCTIBEDBY="userID">
        </DIV>

        <DIV CLASS="form-group">
            <LABEL FOR="Password">Password</LABEL>
            <INPUT TYPE="password" CLASS="form-control" NAME="Password" ID="Password" ARIA-DESCTIBEDBY="Password">
        </DIV>
        <INPUT CLASS="btn btn-primary" TYPE="SUBMIT" VALUE="Login">
        
        </FORM>
        <?php
    }

    function Redirect($url)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url);
        }

        exit();
    }

    function footer() { ?>
    </DIV>
    </BODY>
    </HTML>
    <?php }

}


?>