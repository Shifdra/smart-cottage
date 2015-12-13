<?php
    session_start();
    if (isset($_SESSION["username"])) {
        $_SESSION["username"] = null;
    }
    if (isset($_SESSION["loggedin"])) {
        $_SESSION["loggedin"] = null;
        header("location: ../ClientFiles/home.php");
    }
?>