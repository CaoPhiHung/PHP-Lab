<?php


class Person {

    //Attributes for the first and last name
    public $firstName = "";
    public $lastName = "";

    //The person says hello
    function hello()    {
        echo "Hello, my name is $this->firstName"."<BR>";
    }
}

?>