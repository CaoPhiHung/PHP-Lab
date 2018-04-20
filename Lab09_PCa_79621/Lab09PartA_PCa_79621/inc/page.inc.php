<?php

class Page {

    //Attributes
    private $title = "Lab 09 - PCa_79621";

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

    function addCustomerForm() { ?>

    
    <DIV CLASS="form-group">
        <LABEL FOR="name">ISBN</LABEL>
        <INPUT TYPE="text" CLASS="form-control" NAME="name" ID="name" ARIA-DESCTIBEDBY="nameHelp" PLACEHOLDER="Full Name">
        <small id="nameHelp" class="form-text text-muted">Customer first and last name.</small>
    </DIV>

    <DIV CLASS="form-group">
        <LABEL FOR="address">Author</LABEL>
        <INPUT TYPE="text" CLASS="form-control" NAME="address" ID="address" ARIA-DESCTIBEDBY="addressHelp" PLACEHOLDER="Street Address">
        <small id="addressHelp" class="form-text text-muted">Address including street number, suite number and BSMT if applicable</small>
    </DIV>

    <DIV CLASS="form-group">
        <LABEL FOR="city">City</LABEL>
        <INPUT TYPE="text" CLASS="form-control" NAME="city" ID="city" ARIA-DESCTIBEDBY="cityHelp" PLACEHOLDER="City">
    </DIV>
        <INPUT CLASS="btn btn-primary" TYPE="SUBMIT" VALUE="Add Customer">
    
    <?php
    }

    function show_customers($customer_list) { ?>

        <table class="table">
        <thead>
            <tr>
                <th>CustomerID#</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Update</th>
                <th>Delete</th>
        </thead>
        <tbody>
            <?php
                foreach($customer_list as $customer){
                    echo "<tr><td>".$customer->CustomerID.
                        "</td><td>".$customer->name.
                        "</td><td>".$customer->address.
                        "</td><td>".$customer->city.
                        "</td><td>Update".
                        "</td><td><a href='?deleteID=".$customer->CustomerID."'>Delete</a></td></tr>";
                }
            ?>
        </tbody>
        </table>
        <?php
        }
}


?>