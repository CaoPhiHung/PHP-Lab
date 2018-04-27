<?php

//This class represents a student
//This class MUST EXTEND Person
class Student extends Person  {
    
    //some attributes about the student (id and email)
    public $id;
    public $email;

    /* The default constructor for the Person should include the following attributes:
        $this->id = $newID;
        $this->firstName = $newFirstName;
        $this->lastName = $newLastName;
        $this->email = $newEmail;
    */
    function __construct($newID, $newFirstName, $newLastName, $newEmail){
        $this->id = $newID;
        $this->firstName = $newFirstName;
        $this->lastName = $newLastName;
        $this->email = $newEmail;
    }

    //Override the tostring function
    function __toString()   {
        return "<tr><td>".$this->id.
            "</td><td>".$this->firstName.
            "</td><td>".$this->lastName.
            "</td><td>".$this->email."</td></tr>";
    }
}