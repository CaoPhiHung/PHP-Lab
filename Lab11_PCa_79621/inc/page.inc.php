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
            <!-- <script type="text/javascript" src="inc/main.js"></script> -->

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

    function addBookForm() { ?>

        <FORM METHOD="POST" ACTION="Lab11_PCa_79621.php">
        
        <DIV CLASS="form-group">
            <LABEL FOR="name">ISBN</LABEL>
            <INPUT TYPE="text" CLASS="form-control" NAME="ISBN" ID="ISBN" ARIA-DESCTIBEDBY="ISBNHelp" PLACEHOLDER="ISBN">
        </DIV>
    
        <DIV CLASS="form-group">
            <LABEL FOR="Author">Author</LABEL>
            <INPUT TYPE="text" CLASS="form-control" NAME="Author" ID="Author" ARIA-DESCTIBEDBY="AuthorHelp" PLACEHOLDER="Author">
        </DIV>
    
        <DIV CLASS="form-group">
            <LABEL FOR="city">Title</LABEL>
            <INPUT TYPE="text" CLASS="form-control" NAME="Title" ID="Title" ARIA-DESCTIBEDBY="TitleHelp" PLACEHOLDER="Title">
        </DIV>

        <DIV CLASS="form-group">
            <LABEL FOR="city">Price</LABEL>
            <INPUT TYPE="text" CLASS="form-control" NAME="price" ID="price" ARIA-DESCTIBEDBY="priceHelp" PLACEHOLDER="00.00">
        </DIV>

            <INPUT CLASS="btn btn-primary" TYPE="SUBMIT" VALUE="Add Book">
        
        </FORM>
        <?php
        }

        function editBookForm($book) { ?>

            <FORM METHOD="POST" ACTION="Lab11_PCa_79621.php">
            <input type="hidden" value="update" name="action" />
            <DIV CLASS="form-group">
                <LABEL FOR="name">ISBN</LABEL>
                <INPUT TYPE="text" CLASS="form-control" NAME="ISBN" ID="ISBN" ARIA-DESCTIBEDBY="ISBNHelp" value="<?php echo $book->ISBN;?>" readonly>
            </DIV>
        
            <DIV CLASS="form-group">
                <LABEL FOR="Author">Author</LABEL>
                <INPUT TYPE="text" CLASS="form-control" NAME="Author" ID="Author" ARIA-DESCTIBEDBY="AuthorHelp" value="<?php echo $book->Author;?>">
            </DIV>
        
            <DIV CLASS="form-group">
                <LABEL FOR="city">Title</LABEL>
                <INPUT TYPE="text" CLASS="form-control" NAME="Title" ID="Title" ARIA-DESCTIBEDBY="TitleHelp" value="<?php echo $book->Title;?>">
            </DIV>
    
            <DIV CLASS="form-group">
                <LABEL FOR="city">Price</LABEL>
                <INPUT TYPE="text" CLASS="form-control" NAME="price" ID="price" ARIA-DESCTIBEDBY="priceHelp" value="<?php echo $book->Price;?>"">
            </DIV>
    
                <INPUT CLASS="btn btn-primary" TYPE="SUBMIT" VALUE="Edit Book">
            
            </FORM>
            <?php
            }
    
    function listBooks($books) { ?>
     <!-- Start Customer List -->
        <h1>Books list</h1>
        <table cellpadding="5" cellspacing="0" border="0">
        <tr>
            <td><b>ISBN</b></td>
            <td><b>Author</b></td>
            <td><b>Title</b></td>
            <td><b>Price</b></td>
            <td><b>Delete</b></td>
        </tr>

    <?php
        foreach($books as $book) {
            echo '<tr><td>'.$book->ISBN.'</td>';
            echo '<td>'.$book->Author.'</td>';
            echo '<td>'.$book->Title.'</td>';
            echo '<td>'.$book->Price.'</td>';
            echo "<td><a href='?action=delete&id=$book->ISBN'>Delete</a></td>";
            echo "<td><a href='?action=update&id=$book->ISBN'>Update</a></td>";
            echo '</tr>';
        }
    ?>
    </table>
        <!-- End Customer List -->
    <?php 
        
    }
}
?>