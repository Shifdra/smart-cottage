<?php
    require_once "../LogicFiles/AccountAndUser.php";
    
    session_start();
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //create user object with session values
        $user = new User($_SESSION["username"], $_SESSION["password"]);
        
        //
        if (isset($_POST["btn-add-item"])) {
            //add item
            echo "hi";
        } else if (isset($_POST["btn-rmv-item"])) {
            //remove item
            echo "bye";
        }
        
        if (isset($_POST["sel-retail"])) {
            echo $_POST["sel-retail"];
        }
        
        //redirect back to profile page
        //header("location: ../ClientFiles/cart.php");
    }
?>