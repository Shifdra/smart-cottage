<?php
    require_once "../LogicFiles/AccountAndUser.php";
    
    session_start();
    
    $userName = $password = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        $userName = $_POST["txt-username"];
        $password = $_POST["txt-password"];
        
        $user = new User($userName, $password);
        //test input values with database records
        
        //if user logged in successfully
        if ($user->isLoggedIn()) {
            //set username session var
            $_SESSION["username"] = $userName;
            $_SESSION["password"] = $password;
            
            //set loggedin session var to true
            $_SESSION["loggedin"] = "yes";
            header("location: ../ClientFiles/home.php");
        } else {
            $_SESSION["incorrectlogin"] = "*Incorrect Username or Password";
            header("location: ../ClientFiles/login.php");
        }
    }
?>