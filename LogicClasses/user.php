<html>
<body>
<?php
    class User extends Account {
        
        private $username, $password;
        
        public function __construct($username, $password) {
            parent::__construct();
            $this->username = $username;
            $this->password = $password;
        }
        
        public function __destruct() {
            
        }
        
        public function login() {
            //compare un and pw with what is in db
            $manager = new DBManager("localhost:3306", "root", "", "userdb");
            $manager->select(array("*"),);
            
            if ($this->username == $manager->returnresult()[0] && $this->password == $manager->returnresult()[1]) {
                return true;
            }
            return false;
        }
    }
?>
</body>
</html>
