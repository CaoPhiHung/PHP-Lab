<?php 

class PDOAgent {

    private $dsn = "";
    private $dbuser = "";
    private $dbpass = "";
    public $rowcount;
    public $pdo;
    public $lastInsertId = null;


    function __construct($dbtype, $user, $pass, $host, $db) {
        //Build the DSN for conenction
        $this->dsn = $dbtype.":host=".$host.";dbname=".$db;

        //Username and password credentials
        $this->dbuser = $user;
        $this->dbpass = $pass;
    }

    function __toString()   {
        return "DSN: ".$this->dsn." ";
    }

    function connect()  {
        try {
            $this->pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
        } catch (Exception $ex) {
            echo "Error connecting to the database:".$ex->getMessage();
        }
    }

    function query($strQuery, $bindParams) {
        try {
            $stmt = $this->pdo->prepare($strQuery);
            $stmt->execute($bindParams);
        } catch (Exception $ex) {
            echo "Error Executing Query:".$ex->getMessage();
        }
        
        $resultset = null;

        while ($result =  $stmt->fetch(PDO::FETCH_OBJ)) {
            $resultset[] = $result;
        }
        
        //Update the rowcount
        $this->rowcount = $stmt->rowcount();
        //Update the last inserted id
        $this->lastInsertId = $this->pdo->lastInsertId();
        
        //Return the resultset
        return $resultset;
       
    }

    function disconnect()   {
        try {
            $this->db = null;
        } catch (Exception $ex) {
            echo "Error Disconnect: ".$ex->getMessage();
        }
    }
        
}

/*
//List all the books
$pdotest = new PDOAgent("mysql","root","","localhost","books");
$pdotest->connect();

//SELECT Query
$bindParams = [];
$results = $pdotest->query("SELECT * FROM books;", $bindParams);
$pdotest->disconnect();

echo "Rows Selected: " + $pdotest->rowcount;
echo var_dump($results);



$pdotest->connect();

//INSERT Query
$bindParams = ['ISBN' => '1023456778901',
'Author' => 'Simon Whitlow',
'Title' => 'Using PDO and PHP',
'Price' => '24.99'];
$results = $pdotest->query("INSERT INTO books (ISBN,Author,Title,Price) 
    VALUES ( :ISBN, :Author, :Title, :Price);", $bindParams);
$pdotest->disconnect();

echo "Rows Inserted: " + $pdotest->rowcount;
echo var_dump($results);


//UPDATE Query
$pdotest->connect();

$bindParams = ['newAuthor' => "Sam Student",
                'oldAuthor' => "Simon Whitlow"];
$results = $pdotest->query("UPDATE books SET Author=:newAuthor WHERE Author=:oldAuthor;", $bindParams);
$pdotest->disconnect();

echo "Rows Updated: " + $pdotest->rowcount;
echo var_dump($results);

//DELETE Query
$pdotest->connect();
$bindParams = ['Author' => 'Sam Student'];
$results = $pdotest->query("DELETE FROM books WHERE Author=:Author", $bindParams);
$pdotest->disconnect();

echo "Rows Deleted: " + $pdotest->rowcount;
echo var_dump($results);


//List all the authors
$pdotest = new PDOAgent("mysql","root","","localhost","books");
$pdotest->connect();
$bindParams = [];
$results = $pdotest->query("SELECT * FROM customers",$bindParams);
$pdotest->disconnect();

echo "Rows Selected: " + $pdotest->rowcount;
echo var_dump($results);
*/ 
?>