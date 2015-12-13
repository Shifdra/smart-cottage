<?php

class Table {
    
    private $columnNames;
    private $rows;
    
    public function __construct($columnNames, $rows) {
        $this->columnNames = $columnNames;
        $this->rows = $rows;
    }
    
    public function echoTable() {
        
        $table = '<table class="table-hover"><tr>';
        
        foreach ($this->columnNames as $columnName) {
            $table .= "<th>{$columnName}</th>";
        }
        
        $table .= '</tr>';
        foreach($this->rows as $row) {
            $table .= '<tr>';
            foreach ($row as $column) {
                $table .= "<td>{$column}</td>";
            }
            $table .= '</tr>';
        }
        
        $table .= '</table>';
        
        echo $table;

    }
    
    
}
