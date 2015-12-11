<html>
<body>
<?php
    require_once "account.php";
    require_once "user.php";
    require_once "../DatabaseClasses/DBManager.php";
    require_once "../DatabaseClasses/DBConnection.php";
    
    //instantiate user with input field data
    $account = new User("gtht0026", "blah");
    //compare input data with what is in db
    echo  "</br>" . $account->login();
?>
</body>
</html>