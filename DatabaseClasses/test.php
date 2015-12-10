<html>
<body>
    <?php
        require "DBConnection.php";
        require "DBManager.php";
        
        $manager = new DBManager("localhost:3306", "root", "", "userdb");
        $manager->getColumnNames();
        echo "</br>";
        $manager->select(array("*"));
     ?>
</body>
</html>