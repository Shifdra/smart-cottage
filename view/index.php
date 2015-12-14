<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include '../LogicFiles/AccountAndUser.php';
            include '../LogicFiles/OrderAndOrderItem.php';
            $order = new Order(57);
            echo $order->getOrderID();
        ?>
    </body>
</html>
