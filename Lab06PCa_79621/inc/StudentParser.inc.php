<?php

class StudentParser   {

    public $content = "";
    public $students = array();

    function parseStudents($newStudents)    {
        //Get the content
        $this->content = $newStudents;
        
        //Get the lines of the file (explode)
        $line = explode("\n", $this->content );
        //Get each attribute
        foreach($line as $item){
            $attributes = explode(",",$item);
            
            //Check for blank lines
            if (empty($item))    {
                break;
            }

            //Trim the file contents
            for ($i = 0; $i < sizeof($attributes); $i++)   {
                $attributes[$i] = trim($attributes[$i]);
            }
            //Try to parse
            try {
                //Make sure each row has a the right number of columns (4)
                if (sizeof($attributes) == 4)  {
                    
                    //Create a new object of Class student
                    $newStudent = new Student($attributes[0], $attributes[1],  $attributes[2],$attributes[3]);
                    //Add the students into the parsers array $this->students[];
                    $this->students[] = $newStudent;
                } else {
                    //Throw an exception
                    throw new Exception("File has invalid data!");
                }
            } catch (Exception $e) {
                    //Catch the exception and display it
                    throw new Exception("Caught exception: ".$e->getMessage()."\n");
            }
        }

    //Return the students
    return $this->students;
    }
}

?>