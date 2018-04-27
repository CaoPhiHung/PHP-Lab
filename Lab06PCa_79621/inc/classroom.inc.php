<?php

//This class stores all the students in a classroom
class Classroom {

    //This array stores the students in the classroom
    public $students = array();
    
    //This function adds the students to the classroom
    function addStudent($newStudent)  {
        //Add the new students to the class.
        $this->students[] = $newStudent;
    }

    //This function prints the class list as well as a total of all the students
    function printClassList()   {
        //return the class list as an array of objects
        return $this->students;
    }

}

?>