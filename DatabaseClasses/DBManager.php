<html>
<body>    
    <?php
    class DBManager {
        
        private $dbconn;
        
        public function __construct($servername, $username, $password, $dbname) {
            $this->dbconn = new DBConnection($servername, $username, $password, $dbname);
        }
        
        public function __destruct() {
            $this->dbconn = null;
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
        
        public function insert(array $columns) {
            try {
                $this->dbconn->open();
                
                //prepare statement
                $stmt = $this->dbconn->getConnection()->prepare("INSERT INTO usertb($columns)
                                                                 VALUES ($columns)");
                //execute
                $stmt->execute();
                
                //set query variable to null and close connection
                $stmt = null;
                $this->dbconn->close();
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        
        public function select(array $columns) {
            try {
                //open database connection
                $this->dbconn->open();
                
                //format input args for SELECT statement
                static $selectColumns;
                for ($i = 0; $i < count($columns); $i++) {
                    if ($i == 0) {
                        $selectColumns = $columns[$i];
                    } else {
                        $selectColumns = $selectColumns . ", " . $columns[$i];
                    }
                }
                
                //prepare and execute SQL statement
                $stmt = $this->dbconn->getConnection()->prepare("SELECT $selectColumns FROM usertb");
                $stmt->execute();
                
                //fetch results from query
                //dynamic with number of columns in table
                $colcount = $stmt->columnCount();
                while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    for($i = 0; $i < $colcount; $i++) {
                        echo "|" . $row[$i];
                    }
                    echo "</br>";
                }
                
                $stmt = null;
                //close database connection
                $this->dbconn->close();
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    ?>
</body>
</html>