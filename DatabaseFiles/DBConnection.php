<?php
    class DBConnection {
        
        private $conn, $servername, $username, $password, $dbname;
        
        public function __construct($servername, $username, $password, $dbname) {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->conn = null;
        }
        
        public function __destruct() {
            $this->conn = null;
        }
        
        public function getConnection() {
            return $this->conn;
        }
        
        public function open() {
            //create db connection
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            //set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        public function close() {
            $this->conn = null;
        }
        
    }
?>