<?php

require_once 'DBManager.php';
require_once 'PreparedStatements.php';

class DBSelect extends DBManager {
    
    public function __construct($servername, $username, $password, $dbname) {
        parent::__construct($servername, $username, $password, $dbname);
    }

    public function __destruct() {
        $this->dbconn = null;
    }
    
    public function selectAccountRetailerAverages($username) {
        global $selectAccountRetailerAverages;
        $statement = $this->prepareStatement($selectAccountRetailerAverages);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountRetailerPurchases($username) {
        global $selectAccountRetailerPurchases;
        $statement = $this->prepareStatement($selectAccountRetailerPurchases);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountRetailerQuantityAndPriceTotals($username) {
        global $selectAccountRetailerQuantityAndPriceTotals;
        $statement = $this->prepareStatement($selectAccountRetailerQuantityAndPriceTotals);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountStoreAverages($username) {
        global $selectAccountStoreAverages;
        $statement = $this->prepareStatement($selectAccountStoreAverages);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountStorePurchases($username) {
        global $selectAccountStorePurchases; 
        $statement = $this->prepareStatement($selectAccountStorePurchases);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountStoreQuantityAndPriceTotals($username) {
        global $selectAccountStoreQuantityAndPriceTotals;
        $statement = $this->prepareStatement($selectAccountStoreQuantityAndPriceTotals);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountAvgByProductName($username, $productName) {
        global $selectAccountAvgByProductName;
        $statement = $this->prepareStatement($selectAccountAvgByProductName);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':productName', $productName);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountProductAverages($username) {
        global $selectAccountProductAverages; 
        $statement = $this->prepareStatement($selectAccountProductAverages);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountProductPurchases($username) {
        global $selectAccountProductPurchases;
        $statement = $this->prepareStatement($selectAccountProductPurchases);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectAccountProductQuantityAndPriceTotals($username) {
        global $selectAccountProductQuantityAndPriceTotals;
        $statement = $this->prepareStatement($selectAccountProductQuantityAndPriceTotals);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function hasUserUsername($username) {
        global $selectUserUsername;
        $statement = $this->prepareStatement($selectUserUsername);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            if (count($statement->fetchAll(PDO::FETCH_ASSOC)) == 1) {
                return true;
            }
        }
        else {
            return false;
        }
    }
    
    public function selectUserPassword($username) {
        global $selectUserPassword;
        $statement = $this->prepareStatement($selectUserPassword);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            return $row['password'];
        }
    }
    
    public function selectUserFriends($username) {
        global $selectUserFriends;
        $statement = $this->prepareStatement($selectUserFriends);
        $statement->bindParam(':username', $username);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectItemIDByItemName($itemName) {
        global $selectItemIDByItemName;
        $statement = $this->prepareStatement($selectItemIDByItemName);
        $statement->bindParam(':itemName', $itemName);
        if ($statement->execute()) {
            $row = $statement->fetch();
            return $row['item_id'];
        } 
        
    }
    
    public function selectStoreIDByStoreName($storeName) {
        global $selectStoreIDByStoreName;
        $statement = $this->prepareStatement($selectStoreIDByStoreName);
        $statement->bindParam(':storeName', $storeName);
        if ($statement->execute()) {
            $row = $statement->fetch();
            return $row['store_id'];
        } 
        
    }
    
    public function selectRetailerNames() {
        global $selectRetailerNames;
        $statement = $this->prepareStatement($selectRetailerNames);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectStoreNamesByRetailer($retailerName) {
        global $selectStoreNamesByRetailer;
        $statement = $this->prepareStatement($selectStoreNamesByRetailer);
        $statement->bindParam(':retailerName', $retailerName);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectCategoryNames() {
        global $selectCategoryNames;
        $statement = $this->prepareStatement($selectCategoryNames);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectItemNamesByCategory($categoryName) {
        global $selectItemNamesByCategory;
        $statement = $this->prepareStatement($selectItemNamesByCategory);
        $statement->bindParam(':categoryName', $categoryName);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function selectStoreNameByOrderID($orderID) {
        global $selectStoreNameByOrderID;
        $statement = $this->prepareStatement($selectStoreNameByOrderID);
        $statement->bindParam(':orderID', $orderID);
        if ($statement->execute()) {
            $row = $statement->fetch();
            return $row['store_name'];
        }
    }
    
    
    
    
    
}

?>
