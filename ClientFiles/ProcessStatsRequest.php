<?php
    require_once "../LogicFiles/AccountAndUser.php";
    
    session_start();
    
    $friendName = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $friendName = $_POST["friend-name"];
        
        //create user object with session values
        $user = new User($_SESSION["username"], $_SESSION["password"]);
        
        //access add or remove friend method
        if (isset($_POST["btn-add-friend"])) {
            //add friend
        } else if (isset($_POST["btn-rmv-friend"])) {
            //remove friend
        }
        
        //redirect back to profile page
        header("location: ../ClientFiles/profile.php");
    }
?>