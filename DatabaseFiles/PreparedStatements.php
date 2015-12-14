<?php

$selectAccountRetailerAverages = <<<SQL
    
SELECT r.retailer_name, AVG(oi.price) AS average
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        JOIN retailers r ON
            gs.retailer_id = r.retailer_id
        GROUP BY r.retailer_name
        ORDER BY r.retailer_name
        
SQL;

$selectAccountRetailerPurchases = <<<SQL
    
SELECT r.retailer_name, i.item_name, oi.quantity, oi.price, (oi.quantity * oi.price) AS total
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        JOIN retailers r ON
            gs.retailer_id = r.retailer_id
        ORDER BY r.retailer_name, i.item_name
        
SQL;

$selectAccountRetailerQuantityAndPriceTotals = <<<SQL
        
SELECT r.retailer_name, i.item_name, SUM(oi.quantity) AS total_quantity, SUM(oi.price * oi.quantity) AS total_spent
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        JOIN retailers r ON
            gs.retailer_id = r.retailer_id
        GROUP BY r.retailer_name, i.item_id
        ORDER BY r.retailer_name, i.item_name        
        
SQL;


$selectAccountStoreAverages = <<<SQL
   
SELECT gs.store_name, AVG(oi.price) AS average
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        GROUP BY gs.store_name
    	ORDER BY gs.store_name   
SQL;

$selectAccountStorePurchases = <<<SQL
        
SELECT gs.store_name, i.item_name, oi.quantity, oi.price, (oi.quantity * oi.price) AS total
    FROM users u  
        JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        ORDER BY gs.store_name, i.item_name
        
SQL;

$selectAccountStoreQuantityAndPriceTotals = <<<SQL
        
SELECT gs.store_name, i.item_name, SUM(oi.quantity) AS total_quantity, SUM(oi.price) AS total_spent
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        GROUP BY gs.store_name, i.item_name
        ORDER BY gs.store_name, i.item_name
        
SQL;

$selectAccountProductAverages = <<<SQL
        
SELECT i.item_name, AVG(oi.price) AS average
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        GROUP BY i.item_name
        ORDER BY i.item_name
                 
SQL;

$selectAccountProductPurchases = <<<SQL
       
SELECT i.item_name, oi.quantity, oi.price, (oi.quantity * oi.price) AS total
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        ORDER BY i.item_name
        
SQL;

$selectAccountProductQuantityAndPriceTotals = <<<SQL
        
SELECT i.item_name, SUM(oi.quantity) AS total_quantity, SUM(oi.price) AS total_spent
    FROM users u
    	JOIN orders o ON
            u.username = o.username
            AND u.username = :username
        JOIN order_items oi ON
            o.order_id = oi.order_id
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        GROUP BY i.item_name
        ORDER BY i.item_name
        
SQL;

$selectItemIDByItemName = <<<SQL
        
SELECT i.item_id
    FROM items i 
        WHERE i.item_name = :itemName
        
SQL;

$selectStoreIDByStoreName = <<<SQL
        
SELECT gs.store_id
    FROM grocery_stores gs
    WHERE gs.store_name = :storeName
        
SQL;

$selectStoreNameByOrderID = <<<SQL
        
SELECT gs.store_name
    FROM orders o 
    	JOIN grocery_stores gs
            ON o.store_id = gs.store_id
            AND o.order_id = :orderID   
        
SQL;

$selectUserUsername = <<<SQL
        
SELECT username 
    FROM users
    	WHERE username = :username
        
SQL;

$selectUserPassword = <<<SQL
        
SELECT password
    FROM users
        WHERE username = :username
   
SQL;

$selectUserFriends = <<<SQL
        
SELECT friend_name 
    FROM friends
    	WHERE username = :username       
        
SQL;

$insertNewUser = <<<SQL
      
INSERT IGNORE INTO users (username, first_name, last_name, user_email, password)
	VALUES (:username, :firstName, :lastName, :email, :password)
   
SQL;

$insertNewFriends = <<<SQL
    
INSERT IGNORE INTO friends (username, friend_name) 
    VALUES (:username1, :friendName1),
           (:username2, :friendName2) 
        
SQL;

$insertNewOrder = <<<SQL
       
INSERT IGNORE INTO orders (username, store_id)
    SELECT :username, gs.store_id
    	FROM grocery_stores gs 
        	WHERE gs.store_name = :storeName
        
SQL;

$insertNewOrderItem = <<<SQL
       
INSERT IGNORE INTO order_items (order_id, item_id, store_id, quantity, price)
    SELECT :orderID, si.item_id, si.store_id, :quantity, :price
        FROM store_items si 
            JOIN grocery_stores gs 
            ON si.store_id = gs.store_id
            AND gs.store_name = :storeName
                JOIN items i
                    ON si.item_id = i.item_id
                    AND i.item_name = :itemName

SQL;

$dropFromFriends = <<<SQL
    
DELETE FROM friends 
    WHERE username = :username
    AND friend_name = :friendName   
        
SQL;

$dropFromOrderItems = <<<SQL
    
DELETE FROM order_items 
    WHERE order_id = :orderID
    AND item_id = :itemID
    AND store_id = :storeID
        
SQL;

$selectRetailerNames = <<<SQL

SELECT r.retailer_name 
	FROM retailers r
        
SQL;

$selectStoreNamesByRetailer = <<<SQL

SELECT gs.store_name 
    FROM retailers r
    	JOIN grocery_stores gs
            ON r.retailer_id = gs.retailer_id
            AND r.retailer_name = :retailerName
            
SQL;

$selectCategoryNames = <<<SQL

SELECT c.category_name
	FROM categories c
        
SQL;

$selectItemNamesByCategory = <<<SQL

SELECT i.item_name
    FROM items i 
    	JOIN categories c
            ON i.category_id = c.category_id
            AND c.category_name = :categoryName
        
SQL;

?>