<?php 

class Page  {
    function showHeader($title = "Lab 06 - You should specify a title.")   {
        ?>
        <!-- Begin page header -->
        <HTML>
        <HEAD>
            <TITLE><?php echo $title; ?></TITLE>
            <link rel="stylesheet" href="css/style.css">
            <!-- Add bootstrap lib -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </HEAD>
        <BODY>
        <div class="jumbotron text-center">
            <h1><?php echo $title; ?></h1>
        </div>
      
        <!-- End page header -->
        <?php
    }
    function showUploadForm()   { ?>
       <!-- Fill in this function -->
       <br />
       <div class="text-center">
       <!-- Add form -->
       <FORM METHOD="POST" ACTION="Lab06DisplayPage.php" enctype="multipart/form-data">

            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
            
            
        </FORM>
        </div>
    <?php }
    function showFooter()   {
        ?>
        <!-- Begin page footer -->
         </BODY>
        </HTML>
        <!-- End page footer -->
        <?php
    }
    function htmlDebug($var)    { ?>
        <DIV CLASS="debug"><?php echo var_dump($var); ?></DIV>
    <?php }
    
    function htmlPrintClassList($classlist) { ?>
    <!-- print the class list -->
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
    </thead>
    <tfoot><tr><td colspan="4"><?php echo "<strong>Class size: ".sizeof($classlist)."</strong>"; ?></td></tr></tfoot>
    <tbody>
    <?php 
        //print out all students
        foreach($classlist as $student){
            echo $student;
        }
        echo "</tbody></table>";
    ?>
    <?php }
}

?>