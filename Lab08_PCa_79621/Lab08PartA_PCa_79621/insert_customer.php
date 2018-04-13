<!DOCTYPE html>
<html>
<head>
  <title>Book-O-Rama Customer Entry Results</title>
</head>
<body>
  <h1>Book-O-Rama Customer Entry Results</h1>
  <?php

    if (!isset($_POST['Name']) || !isset($_POST['Address']) 
         || !isset($_POST['City'])) {
       echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
       exit;
    }

    // create short variable names
    $name=$_POST['Name'];
    $address=$_POST['Address'];
    $city=$_POST['City'];

    @$db = new mysqli('localhost', 'root', '', 'books');

    if (mysqli_connect_errno()) {
       echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
       exit;
    }

    $query = "INSERT INTO customers (name, address, city) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sss", $name, $address, $city);
    
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo  "<p>Customer inserted into the database.</p>";
    } else {
        echo "<p>An error has occurred.<br/>
              The item was not added.</p>";
    }
  
    $db->close();
  ?>
</body>
</html>
