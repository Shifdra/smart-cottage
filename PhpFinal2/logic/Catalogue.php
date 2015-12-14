<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Catalogue
 *
 * @author Cody
 */

require_once '../database/DBSelect.php';

class Catalogue {
    
    
    public function getRetailerNames() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectRetailerNames();
        $selector = null;
        $names = array();
        $names = array();
        foreach ($result as $row) {
            foreach ($row as $column) {
                array_push($names, $column);
            }
        }
        return $names;;
    }
    
    public function getStoreNamesByRetailer($retailerName) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectStoreNamesByRetailer($retailerName);
        $selector = null;
        $names = array();
        foreach ($result as $row) {
            foreach ($row as $column) {
                array_push($names, $column);
            }
        }
        return $names;
    }
    
    public function getCategoryNames() {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectCategoryNames();
        $selector = null;
        $names = array();
        foreach ($result as $row) {
            foreach ($row as $column) {
                array_push($names, $column);
            }
        }
        return $names;
    }
    
    public function getItemNamesByCategory($categoryName) {
        $selector = new DBSelect('localhost', 'root', '', 'mydb');
        $result = $selector->selectItemNamesByCategory($categoryName);
        $selector = null;
        $names = array();
        foreach ($result as $row) {
            foreach ($row as $column) {
                array_push($names, $column);
            }
        }
        return $names;
    }
    
    
    
}

?>
