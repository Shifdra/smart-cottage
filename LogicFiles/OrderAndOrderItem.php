<?php


class Order {
    
    private $orderItems;
    private $username;
    private $orderID;
    private $storeName;
     
    public function __construct($orderID) {
        $this->orderItems = array();
        $this->orderID = $orderID;
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $this->storeName = $selector->selectStoreNameByOrderID($orderID);
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
    
    public function removeItemFromOrder($itemName) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $storeID = $selector->selectStoreIDByStoreName($this->storeName);
        $itemID = $selector->selectItemIDByItemName($itemName);
        $selector = null;
        $dropper = new DBDrop('localhost', 'root', '', 'mydb');
        $dropper->dropFromOrderItems($this->orderID, $storeID, $itemID);
    }
    
    public function getOrderID() {
        return $this->orderID;
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
