<?php

require_once '../database/DBSelect.php';
require_once '../database/DBInsert.php';
require_once 'OrderAndOrderItem.php';
require_once 'Table.php';

class Account {
    
    private $username;
    
    public function __construct($username) {
        $this->username = $username;
    }
    
    public function __destruct() {
        $this->username = null;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getAccountAvgByRetailerName($retailerName) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountAvgByRetailerName($this->username, $retailerName);
        $selector = null;
        return $result;
    }
    
    public function getAccountRetailerAverages() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountRetailerAverages($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountRetailerPurchases() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountRetailerPurchases($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountRetailerQuantityAndPriceTotals() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountRetailerQuantityAndPriceTotals($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountAvgByStoreName($storeName) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountAvgByStoreName($this->username, $storeName);
        $selector = null;
        return $result;
    }
    
    public function getAccountStoreAverages() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountStoreAverages($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountStorePurchases() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountStorePurchases($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountStoreQuantityAndPriceTotals() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountStoreQuantityAndPriceTotals($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountAvgByProductName($productName) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountAvgByProductName($this->username,$productName);
        $selector = null;
        return $result;
    }
    
    public function getAccountProductAverages() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountProductAverages($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountProductPurchases() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountProductPurchases($this->username);
        $selector = null;
        return $result;
    }
    
    public function getAccountProductQuantityAndPriceTotals() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectAccountProductQuantityAndPriceTotals($this->username);
        $selector = null;
        return $result;
    }
    
}
    

class User extends Account {
    
    private $password;
    private $loggedIn;
    
    public function __construct($username, $password) {
        parent::__construct($username);
        $this->password = $password;
        
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->hasUserUsername($this->getUsername());
        if ($result) {
            $password = $selector->selectUserPassword($this->getUsername());
            if ($this->password == $password) {
                $this->loggedIn = true;
            }
            else {
                echo('password');
            }
        }
        else {
            echo('username');
        }
       
    }
    
    public function __destruct() {
        parent::__destruct();
        $this->password = null;
        $this->loggedIn = null;
    }
    
    public static function addNewUser($username, $firstName, $lastName, $email, $password) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->hasUserUsername($username);
        if ($result) {
            $selector = null;
            return false;
        }
        else {
            $selector = null;
            $insertor = new DBInsert('localhost', 'root', '', 'mydb');
            $insertor->insertNewUser($username, $firstName, $lastName, $email, $password);
            $insertor = null;
            return true;
        }
    }
    
    public function isLoggedIn() {
        return $this->loggedIn;
    }
    
    public function createNewOrder($storeName) {
        $insertor = new DBInsert('localhost', 'root', '', 'mydb');
        $orderID = $insertor->insertNewOrder($this->getUsername(), $storeName);
        return new Order($storeName, $orderID);
    }
    
    public function getUserFriends() {
        
    }
    
    public function getAccountAvgByRetailerName($retailerName) {
        $result = parent::getAccountAvgByRetailerName($retailerName);
        $columns = array('Retailer', 'Average Spent');
        return new Table($columns, $result);
    }
    
    public function getAccountRetailerAverages() {
        $result = parent::getAccountRetailerAverages();
        $columns = array('Retailer', 'Average Spent');
        return new Table($columns, $result);
    }
    
    public function getAccountRetailerPurchases() {
        $result = parent::getAccountRetailerPurchases();
        $columns = array('Retailer', 'Item Name', 'Price', 'Quantity', 'Total');
        return new Table($columns, $result);
    }
    
    public function getAccountRetailerQuantityAndPriceTotals() {
        $result = parent::getAccountRetailerQuantityAndPriceTotals();
        $columns = array('Retailer', 'Item Name', 'Total Quantity', 'Total Spent');
        return new Table($columns, $result);
    }
    
    public function getAccountAvgByStoreName($storeName) {
        $result = parent::getAccountAvgByStoreName($storeName);
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountStoreAverages() {
        $result = parent::getAccountStoreAverages();
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountStorePurchases() {
        $result = parent::getAccountStorePurchases();
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountStoreQuantityAndPriceTotals() {
        $result = parent::getAccountStoreQuantityAndPriceTotals();
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountAvgByProductName($productName) {
        $result = parent::getAccountAvgByProductName($productName);
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountProductAverages() {
        $result = parent::getAccountProductAverages();
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountProductPurchases() {
        $result = parent::getAccountProductPurchases();
        $columns = array();
        return new Table($columns, $result);
    }
    
    public function getAccountProductQuantityAndPriceTotals() {
        $result = parent::getAccountProductPurchases();
        $columns = array();
        return new Table($columns, $result);
    }
    
    
    
}

?>
