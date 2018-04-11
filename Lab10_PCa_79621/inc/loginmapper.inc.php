<?php

class loginmapper    {

function check_used_login($postData){
    // $conn = new PDO("mysql:host=localhost;dbname=web_auth", DBUSER, DBPASSWD);
    $conn = new PDOAgent("mysql","root","","localhost",DB);

    $conn->connect();
    //Setup the Bind Parameters
    $bindParams = ['userid' => $postData["userID"]];

    $results = $conn->query("SELECT passwd FROM authorized_users WHERE userid like :userid;", $bindParams);
    $check = password_verify($postData["Password"], $results[0]->passwd);
    $conn->disconnect();
    return $check;
}

}

?>