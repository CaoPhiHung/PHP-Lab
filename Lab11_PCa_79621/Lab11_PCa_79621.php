<?php
    require_once("inc/page.inc.php");
    $page = new page();
    $page->header();
    $book_array = [];
    

    $curdir = dirname($_SERVER['REQUEST_URI'])."/";
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$curdir;

    if(isset($_GET)&& !empty($_GET["action"])){
        
        if($_GET["action"]== 'delete' ){
            $url = $actual_link."/delete.php";
            $data = "id=".$_GET["id"];
            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec( $ch );
            $msg = json_decode($response)->msg;
            echo "<DIV CLASS='alert alert-success'>$msg</DIV>";
        }

    }else if(isset($_POST) && !empty($_POST['action']) && ($_POST['action'] == 'update')){
        $url = $actual_link."/update.php";
        $data = "isbn=".$_POST["ISBN"]."&author=".$_POST["Author"]."&title=".$_POST["Title"]."&price=".$_POST["price"];
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        $msg = json_decode($response)->msg;
        echo "<DIV CLASS='alert alert-success'>$msg</DIV>";

    } else if(isset($_POST)&& !empty($_POST['Author'])){
        $url = $actual_link."/create.php";
        $data = "isbn=".$_POST["ISBN"]."&author=".$_POST["Author"]."&title=".$_POST["Title"]."&price=".$_POST["price"];
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        $msg = json_decode($response)->msg;
        echo "<DIV CLASS='alert alert-success'>$msg</DIV>";
    }

    $msg = file_get_contents($actual_link."/read.php");
    $book = json_decode($msg, true);
    
    for($i=0;$i<count($book);$i++){ 
        $line = new stdClass; 
        $line->ISBN = $book[$i]["ISBN"]; 
        $line->Author = $book[$i]["Author"]; 
        $line->Title = $book[$i]["Title"]; 
        $line->Price = $book[$i]["Price"]; 
        $book_array[] = $line; 
    }

    if(isset($_GET) && !empty($_GET["action"]) && $_GET['action'] == 'update'){
        foreach($book_array as $book) {
            if($_GET['id'] == $book->ISBN ){
                $page->editBookForm($book);
                break;
            }
        }
        
    }else{
        $page->addBookForm();
    }

    $page->listBooks($book_array);
    $page->footer();
?>