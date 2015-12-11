<html>
<body>
    <?php
        require_once "DBConnection.php";
        require_once "DBManager.php";
        
        $manager = new DBManager("localhost:3306", "root", "", "userdb");
        $manager->getColumnNames();
        echo "</br>";
        $manager->select(array("*"));
     ?>
</body>
</html>