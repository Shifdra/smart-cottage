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
            
            include 'Form.php';
            $form = new Form('myForm', 'index.php', 'post', 'Form.css');
            $checkBoxes = array('Apples' => 'apples', 'Bananas' => 'bananas');
            $form->addCheckBoxes($checkBoxes);
            echo $form->getForm();
        
        ?>
    </body>
</html>
