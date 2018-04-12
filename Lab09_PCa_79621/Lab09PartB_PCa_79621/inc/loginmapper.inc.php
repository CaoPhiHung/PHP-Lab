<?php

class loginmapper    {

function check_used_login($postData){
    // $conn = new PDO("mysql:host=localhost;dbname=web_auth", DBUSER, DBPASSWD);
        $conn = new PDOAgent("mysql","root","","localhost","web_auth");
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT passwd FROM authorized_users WHERE userid like :userid");
        $stmt->bindParam(":userid",$postData["userID"]); 
        $stmt->execute();

        $results =  $stmt->fetch();
        
        $conn = null;
        var_dump($postData["Password"]);
        var_dump($results['passwd']);
        $check = password_verify($postData["Password"], $results['passwd']);
        var_dump($check);
        return $check;
}

}

?>