<?php

class Customer {

    //Attributes
    public $CustomerID = 0;
    public $name = "";
    public $address = "";
    public $city = "";

    //Default constructor method
    function __construct($newName, $newAddress, $newCity)   {
        $this->name = $newName;
        $this->address = $newAddress;
        $this->city = $newCity;
    }

    function setCustomerID($CustomerID){
        $this->CustomerID = $CustomerID;
    }
}

?>
