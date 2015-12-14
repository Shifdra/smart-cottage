<?php

require_once 'DBManager.php';
require_once 'PreparedStatements.php';

class DBDrop extends DBManager {
    
    public function __construct($servername, $username, $password, $dbname) {
        parent::__construct($servername, $username, $password, $dbname);
    }

    public function __destruct() {
        $this->dbconn = null;
    }
    
    public function dropFromFriends($username, $friendName) {
        global $dropFromFriends;
        $statement = $this->prepareStatement($dropFromFriends);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':friendName', $friendName);
        return $statement->execute();
    }
    
    public function dropFromOrderItems($orderID, $storeID, $itemID) {
        global $dropFromOrderItems;
        $statement = $this->prepareStatement($dropFromOrderItems);
        $statement->bindParam(':orderID', $orderID);
        $statement->bindParam(':storeID', $storeID);
        $statement->bindParam(':itemID', $itemID);
        return $statement->execute();
    }
    
}
