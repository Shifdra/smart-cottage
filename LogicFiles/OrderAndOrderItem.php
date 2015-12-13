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
    private $username;
    private $orderID;
     
    public function __construct($storeName, $orderID) {
        $this->orderItems = array();
        $this->storeName = $storeName;
        $this->orderID = $orderID;
    }
    
    public function __destruct() {
        $this->storeName = null;
        $this->username = null;
    }
    
    public function addOrderItemToOrder(OrderItem $orderItem) {
        $insertor = new DBInsert('localhost', 'root', '', 'mydb');
        $insertor->insertNewOrderItem($this->orderID, $this->storeName, 
                $orderItem->getItemName(), $orderItem->getQuantity(), $orderItem->getPrice());
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
