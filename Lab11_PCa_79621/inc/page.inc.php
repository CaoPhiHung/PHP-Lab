<?php


class Page {

    private $title = "Lab 11";

    function Redirect($file)   {
        //Assemble the url
        $scheme = $_SERVER['REQUEST_SCHEME'].'://';
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        
        //Append the new relative file
        $url =  $scheme.$host.$uri.'/'.$file;

        //Send the appropriate HTTP redirection url
        header('Location: '.$url, true, $permanent ? 301 : 302);
        exit();
    }
    
    

    function header()   { 
               
        ?>
        <!-- Begin Header -->
        <!DOCTYPE HTML>
        <HTML LANG="en">
        <HEAD>
        <!-- Boot strap Include files -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <TITLE>
            <?php echo $this->title; ?>
            </TITLE>
            <!-- JQuery Libirary and js file for AJAX call -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script type="text/javascript" src="inc/main.js"></script>

        </HEAD>
        <BODY>
        <DIV CLASS="container">
        <DIV CLASS="jumbotron"><H1><?php echo $this->title; ?></H1></DIV>
            
        <!-- End Header -->
    <?php

    }

    function footer() { ?>

        <!-- Begin Footer -->
        </div>
        <!-- Bootstrap include files -->
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </BODY>
    </HTML>
        <!-- End Footer -->
    
    <?php 
    
    }

    function listCustomers($customers) { ?>
     <!-- Start Customer List -->
        <h1>Customers list</h1>
        <table cellpadding="5" cellspacing="0" border="0">
        <tr>
            <td><b>Customer</b></td>
            <td><b>Address</b></td>
            <td><b>City</b></td>
        </tr>

    <?php
        foreach($customers as $customer) {
            echo '<tr><td>'.$customer->Name.'</td>';
            echo '<td>'.$customer->Address.'</td>';
            echo '<td>'.$customer->City.'</td>';
            echo '</tr>';
        }
    ?>
    </table>
        <!-- End Customer List -->
    <?php 
        
    }
}
?>