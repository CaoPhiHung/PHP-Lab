<?php

class Page {

    //Attributes
    private $title = "Lab 09 Part B - PCa_79621";

    function header() { ?>
        <!DOCTYPE HTML>
        <HTML LANG="en">
        <HEAD>
        <!-- Boot strap Include files -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <TITLE>
            <?php echo $this->title; ?>
            </TITLE>
        </HEAD>
        <BODY>
        <DIV CLASS="container">
        <DIV CLASS="jumbotron"><H1><?php echo $this->title; ?></H1></DIV>


    <?php }

    function footer() { ?>
        </div>
        <!-- Bootstrap include files -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </BODY>
    </HTML>
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
}


?>