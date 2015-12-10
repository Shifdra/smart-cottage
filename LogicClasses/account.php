<html>
<body>
<?php
    class Account {
        private $username, $password;
        
        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
        }
        
        public function __destruct() {
        }
        
        public function getAvgSpent($retailerName) {
            echo "average spent";
        }
    }
?>
</body>
</html>
