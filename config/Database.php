<?php
    class Database {
        //DB PARAMS
        private $host = 'localhost';
        private $db_name = 'myblog';
        private $db_user = 'root';
        private $db_password = '';
        private $conn;


        //DB CONNECT
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->db_user, $this->db_password);
                $this->conn->setATTRIBUTE(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Connection Error:'. $e->getMessage();
            }

            return $this->conn;
        }
    }

?>