<?php
//Add the required files in
require('inc/page.inc.php');
require('inc/person.inc.php');
require('inc/student.inc.php');
require('inc/StudentParser.inc.php');
require('inc/classroom.inc.php');

//Get the contents of the file
if (isset($_FILES)) {
    //Read in the file
    try {
        $fileName = $_FILES['fileToUpload']['name'];
        $handle = fopen($fileName,'r');

        //throw error if cannot open the file
        if(!$handle)    {
            throw new Exception("File open failed!");
        }
        //read content of the file
        $content = fread($handle,filesize($fileName));
        fclose($handle);    
        
    // catch exception and display it
    } catch (Exception $e) {
        throw new Exception("Caught exception: ".$e->getMessage()."\n");
    }
}


//Now that we have the contents parse them to the new objects
$parser = new StudentParser();
$newStudentArray = $parser->parseStudents($content);


//Instantiate a class
$newClass = new Classroom();

foreach ($newStudentArray as $student)  {
    //$student->hello();
    $newClass->addStudent($student);
}

//Make a new page
$p = new Page();

$p->showHeader("Lab06PCa_79621 - ClassList");
//$p->htmlDebug($newStudentArray);
$p->htmlPrintClassList($newClass->printClassList());
$p->showFooter();

?>