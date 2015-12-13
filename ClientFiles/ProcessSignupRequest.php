<?php
    require_once "../LogicFiles/AccountAndUser.php";
    
    session_start();
    
    $userName = $password = $firstName = $lastName = $email = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        $userName = $_POST["txt-username"];
        $password = $_POST["txt-password"];
        $firstName = $_POST["txt-fname"];
        $lastName = $_POST["txt-lname"];
        $email = $_POST["txt-email"];
        
        $user = new User($userName, $password);
        //create new user in database
        
        //set username and password session var
        $_SESSION["username"] = $userName;
        $_SESSION["password"] = $password;
        
        //set loggedin session var to true
        $_SESSION["loggedin"] = "yes";
        header("location: ../ClientFiles/home.php");
    }
?>