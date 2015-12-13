<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Cody
 */
class Order {
    
    private $orderItems;
    private $storeName;
    private $username;
    private $exists;
    
    public function __construct($storeName, $username) {
        $this->orderItems = array();
        $this->storeName = $storeName;
        $this->username = $username;
        $this->exists = true;
    }
    
    public function __destruct() {
        $this->storeName = null;
        $this->username = null;
    }
    
    public function exists() {
        return $this->exists;
    }
    
    public function addOrderItemToOrder($orderItem) {
        
    }

}

class OrderItem {
    
    private $itemName;
    private $quantity;
    private $price;
    
    public function __construct($itemName, $quantity, $price) {
        $this->itemName = $itemName;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    
    public function getItemName() {
        return $this->itemName;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
    
    public function getPrice() {
        return $this->price;
    }
            
    
}

?>
