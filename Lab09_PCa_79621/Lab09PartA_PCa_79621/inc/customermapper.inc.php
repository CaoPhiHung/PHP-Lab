<?php

class customermapper    {

    //Attributes
    private $lastInsertId = null;
    private $customer_list = array();
    function create($postdata)
    {

        //Insert a new customer based on the post data that was inserted
        $customer = new Customer($postdata["name"],$postdata["address"],$postdata["city"]);

        //new PDOAgent
        $p = new PDOAgent("mysql",DBUSER,DBPASSWD,"localhost","books");

        //Connect to the Database
        $p->connect();

        //Setup the Bind Parameters
        $bindParams = ['name' => $customer->name,
        'address' => $customer->address,
        'city' => $customer->city];

        //Get the results of the insert query (rows inserted)
        $results = $p->query("INSERT INTO customers (Name, Address, City) 
            VALUES ( :name, :address, :city );", $bindParams);

        //copy the last inserted id
        $this->lastInsertId = $p->lastInsertId;

        //Disconnect from the database
        $p->disconnect();
        
        if ($p->rowcount != 1)  {
            trigger_error("Something when horribly wrong!");
            die();
        }
        
        //echo "<HR>".$this->lastInsertId."<HR>";
        //Return the last inserted ID from the PDO class (This is very important!)
        return $this->lastInsertId;

    }

    function get_customer_list(){
         //new PDOAgent

        $conn = new PDO("mysql:host=localhost;dbname=books", DBUSER, DBPASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT *FROM customers"); 
        $stmt->execute();
        // $db->execute();

        $results =  $stmt->fetchAll();
        $conn = null;
        
        // if ($p->rowcount != 1)  {
        //     trigger_error("Something when horribly wrong!");
        //     die();
        // }
        // var_dump($results);
        foreach($results as $customer){
            // var_dump($customer);
            $cust = new Customer($customer['Name'],$customer['Address'],$customer['City']);
            $cust->setCustomerID($customer['CustomerID']);
            $this->customer_list[] = $cust;
        }

        return $this->customer_list;
    }

    function read($customer) {
        
    }

    function update($customer)   {

    }

    function delete( $customerID )   {
        $conn = new PDO("mysql:host=localhost;dbname=books", DBUSER, DBPASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" DELETE  FROM customers WHERE CustomerID LIKE $customerID");
        // $stmt->bindParam(":id", $customerID);
        $stmt->execute();
        // $stmt->execute();
        // $db->execute();
        $conn = null;
        // $results =  $stmt->fetchAll();
        // var_dump($stmt);
    }

}

?>