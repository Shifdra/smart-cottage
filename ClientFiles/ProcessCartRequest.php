<?php
    require_once "../LogicFiles/AccountAndUser.php";
    require_once "../LogicFiles/OrderAndOrderItem.php";
    
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //set session var to dropdown selection
        if (isset($_POST["sel-retail"])) {
            $_SESSION["retailselected"] = $_POST["sel-retail"];
        }
        if (isset($_POST["sel-store"])) {
            $_SESSION["storeselected"] = $_POST["sel-store"];
        }
        if (isset($_POST["sel-cat"])) {
            $_SESSION["catselected"] = $_POST["sel-cat"];
        }
        if (isset($_POST["sel-item"])) {
            $_SESSION["itemselected"] = $_POST["sel-item"];
        }
        if (isset($_POST["txt-price"])) {
            $_SESSION["price"] = $_POST["txt-price"];
        }
        if (isset($_POST["txt-quantity"])) {
            $_SESSION["quantity"] = $_POST["txt-quantity"];
        }      
        
        //create order item and add to orderitem session array
        if (isset($_POST["btn-add-item"]) && isset($_SESSION["orderid"])) {        
            $orderItem = new OrderItem($_SESSION["itemselected"], $_SESSION["quantity"], $_SESSION["price"]);
            array_push($_SESSION["orderitemsel"], $orderItem->getItemName());
            array_push($_SESSION["orderprice"], $orderItem->getPrice());
            array_push($_SESSION["orderquantity"], $orderItem->getQuantity());
        }
        //if this is the first item to add to orderitem session array
        if (isset($_POST["btn-add-item"]) && !isset($_SESSION["orderid"])) {
            //create new order
            $user = new User($_SESSION["username"], $_SESSION["password"]);          
            //add orderid to session var
            $_SESSION["orderid"] = $user->createNewOrder($_SESSION["storeselected"]);
            
            //create order item and add to order
            $orderItem = new OrderItem($_SESSION["itemselected"], $_SESSION["quantity"], $_SESSION["price"]);
            
            $_SESSION["orderitemsel"] = array();
            $_SESSION["orderprice"] = array();
            $_SESSION["orderquantity"] = array();
            
            array_push($_SESSION["orderitemsel"], $orderItem->getItemName());
            array_push($_SESSION["orderprice"], $orderItem->getPrice());
            array_push($_SESSION["orderquantity"], $orderItem->getQuantity());
        }
        
        //remove item from order item array
        if (isset($_POST["btn-rmv-item"]) && isset($_POST["sel-cart"])) {
            foreach($_POST["sel-cart"] as $val) {
                unset($_SESSION["orderitemsel"][$val]);
                $_SESSION["orderitemsel"] = array_values($_SESSION["orderitemsel"]);
                
                unset($_SESSION["orderprice"][$val]);
                $_SESSION["orderprice"] = array_values($_SESSION["orderprice"]);
                
                unset($_SESSION["orderquantity"][$val]);
                $_SESSION["orderquantity"] = array_values($_SESSION["orderquantity"]);
            }
        }
        
        //add to order
        if (isset($_POST["btn-commit"])) {
            //commit order to the database
            $order = new Order($_SESSION["orderid"]);
            $order->addOrderItemToOrder($orderItem);
        }
        
        //redirect back to profile page
        header("location: ../ClientFiles/cart.php");
    }
?>