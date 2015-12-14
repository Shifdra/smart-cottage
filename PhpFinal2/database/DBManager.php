<?php

    require_once 'DBConnection.php';

    class DBManager {
        
        protected $dbconn;
        
        public function __construct($servername, $username, $password, $dbname) {
            $this->dbconn = new DBConnection($servername, $username, $password, $dbname);
        }
        
        public function __destruct() {
            $this->dbconn = null;
        }
        
        protected function prepareStatement($statement) {
            $this->dbconn->open();
            $preparedStatement = $this->dbconn->getConnection()->prepare($statement);
            $this->dbconn->close();
            return $preparedStatement;
        }
        
        public function getColumnNames() {
            try {
                $this->dbconn->open();
                
                //prepare statement
                $stmt = $this->dbconn->getConnection()->prepare("SHOW COLUMNS FROM usertb");
                //execute
                $stmt->execute();
                
                $colcount = $stmt->columnCount();
                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo "|" . $row[0];
                }
                
                //set query variable to null and close connection  
                $stmt = null;
                $this->dbconn->close();
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }            
        }
        
    }
    ?>