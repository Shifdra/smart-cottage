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
            
            include '../logic/Catalogue.php';
            $catalogue = new Catalogue();
            $retailerNames = $catalogue->getRetailerNames();
            foreach ($retailerNames as $name) {
                echo $name . '<br>';
            }
            $storeNames = $catalogue->getStoreNamesByRetailer('Sobeys');
            foreach ($retailerNames as $name) {
                echo $name . '<br>';
            }
            $categoryNames = $catalogue->getCategoryNames();
            foreach ($retailerNames as $name) {
                echo $name . '<br>';
            }
            $itemNames = $catalogue->getItemNamesByCategory('meat');
            foreach ($retailerNames as $name) {
                echo $name . '<br>';
            }
            
        ?>
    </body>
</html>
