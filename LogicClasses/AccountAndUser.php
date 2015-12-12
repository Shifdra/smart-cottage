<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountAndUser
 *
 * @author Cody
 */
class Account {
    
    private $userName;
    
    public function __construct($userName) {
        $this->userName = $userName;
    }
    
    public function __destruct() {
        $this->userName = null;
    }
    
    public function getUserName() {
        return $this->userName;
    }
    
    public function getAccountAvgByRetailerName($retailerName) {
        
    }
    
    public function getAccountRetailerAverages() {
        
    }
    
    public function getAccountRetailerPurchases() {
        
    }
    
    public function getAccountRetailerQuantityAndPriceTotals() {
        
    }
    
    public function getAccountAvgByStoreName($storeName) {
        
    }
    
    public function getAccountStoreAverages() {
        
    }
    
    public function getAccountStorePurchases() {
        
    }
    
    public function getAccountStoreQuantityAndPriceTotals() {
        
    }
    
    public function getAccountAvgByProductName($productName) {
        
    }
    
    public function getAccountProductAverages() {
        
    }
    
    public function getAccountProductPurchases() {
        
    }
    
    public function getAccountProductQuantityAndPriceTotals() {
        
    }
    
}
    

class User extends Account {
    
    private $password;
    private $loggedIn;
    
    public function __construct($userName, $password) {
        parent::__construct($userName);
        $this->password = $password;
        $this->loggedIn = true;
    }
    
    public function __destruct() {
        parent::__destruct();
        $this->password = null;
        $this->loggedIn = null;
    }
    
    public static function addNewUser($userName, $password, $firstName, $lastName, $email) {
        
    }
    
    public function isLoggedIn() {
        return $this->loggedIn;
    }
    
    public function createNewOrder($storeName) {
        
    }
    
    public function getUserFriends() {
        
    }
    
    
    
}

?>
