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
            
            include 'Table.php';
            
            $columnNames = array(1,2,3);
            $rows = array(range(1,3),range(1,3),range(1,3));
            
            $table = new Table($columnNames, $rows);
            
            $table->echoTable();
        ?>
    </body>
</html>
