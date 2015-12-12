<?php

$selectAvgByRetailerName = <<<SQL

SELECT r.retailer_name, AVG(oi.quantity * oi.price) AS average
    FROM order_items oi
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
    	JOIN grocery_stores gs ON
            si.store_id = gs.store_id
   	JOIN retailers r ON
            gs.retailer_id = r.retailer_id
            AND r.retailer_name = :retailerName
        GROUP BY r.retailer_name
        ORDER BY r.retailer_name

SQL;

$selectRetailerAverages = <<<SQL
        
SELECT r.retailer_name, AVG(oi.quantity * oi.price) AS average
    FROM order_items oi
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

$selectAccountAvgByRetailerName = <<<SQL
        
SELECT r.retailer_name, AVG(oi.quantity * oi.price) AS average
    FROM users u
    	JOIN orders o ON
            u.username = o.user_name
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
            AND r.retailer_name = :retailerName
        GROUP BY r.retailer_name
        ORDER BY r.retailer_name
   
SQL;

$selectAccountRetailerAverages = <<<SQL
    
SELECT r.retailer_name, AVG(oi.quantity * oi.price) AS average
    FROM users u
    	JOIN orders o ON
            u.username = o.user_name
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
            u.username = o.user_name
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
        
SELECT r.retailer_name, i.item_name, SUM(oi.quantity) AS total_quantity, SUM(oi.price) AS total_spent
    FROM users u
    	JOIN orders o ON
            u.username = o.user_name
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

$selectAvgByStoreName = <<<SQL
        
SELECT gs.store_name, AVG(oi.quantity * oi.price) AS average
    FROM order_items oi
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN grocery_stores gs ON
            si.store_id = gs.store_id
            AND gs.store_name = :storeName
        GROUP BY gs.store_name
        ORDER BY gs.store_name
        
SQL;

$selectStoreAverages = <<<SQL
        
SELECT gs.store_name, AVG(oi.quantity * oi.price) AS average
    FROM order_items oi
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
    	JOIN grocery_stores gs ON
            si.store_id = gs.store_id
        GROUP BY gs.store_name
        ORDER BY gs.store_name

SQL;

$selectAccountAvgByStoreName = <<<SQL
        
SELECT gs.store_name, AVG(oi.quantity * oi.price) AS average
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
            AND gs.store_name = :storeName
        GROUP BY gs.store_name
    	ORDER BY gs.store_name
        
SQL;

$selectAccountStoreAverages = <<<SQL
   
SELECT gs.store_name, AVG(oi.quantity * oi.price) AS average
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

$selectAvgByProductName = <<<SQL
    
SELECT i.item_name, AVG(oi.quantity * oi.price) AS average
    FROM order_items oi
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
    	JOIN items i ON
            si.item_id = i.item_id
            AND i.item_name = :itemName
        GROUP BY i.item_name
        ORDER BY i.item_name
        
SQL;

$selectProductAverages = <<<SQL

SELECT i.item_name, AVG(oi.quantity * oi.price) AS average
    FROM order_items oi
        JOIN store_items si ON 
            oi.item_id = si.item_id
            AND oi.store_id = si.store_id
        JOIN items i ON
            si.item_id = i.item_id
        GROUP BY i.item_name
        ORDER BY i.item_name
        
SQL;

$selectAccountAvgByProductName = <<<SQL
        
SELECT i.item_name, AVG(oi.quantity * oi.price) AS average
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
            AND i.item_name = :itemName
        GROUP BY i.item_name
        ORDER BY i.item_name
             
SQL;

$selectAccountProductAverages = <<<SQL
        
SELECT i.item_name, AVG(oi.quantity * oi.price) AS average
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

$selectUserUsernameAndPassword = <<<SQL
        
SELECT username, password 
	FROM users
    	WHERE username = :username
       	AND password = :password 
        
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
	SELECT u.username, gs.store_id
    	FROM users u 
        	JOIN orders o ON
            	u.username = o.username
            JOIN grocery_stores gs ON
            	o.store_id = gs.store_id
               	AND gs.store_name = :username    
        
SQL;

$insertNewOrderItem = <<<SQL
       
INSERT IGNORE INTO order_items (order_id, item_id, store_id)
    SELECT o.order_id, i.item_id, gs.store_id
    	FROM orders o 
            JOIN order_items oi ON
            	o.order_id = oi.order_id
                AND o.username = :username
            JOIN store_items si ON
            	oi.store_id = si.store_id
            	AND oi.item_id = si.item_id
            JOIN grocery_stores gs ON
            	si.store_id = gs.store_id
                AND gs.store_name = :storeName
            JOIN items i ON
            	si.item_id = i.item_id
                AND i.item_name = :itemName
        
SQL;

?>