<?php    

    class Database
    {
        private $host = "localhost";
        private $db_name = "db_product";
        private $username = "root";
        private $password = "TR4vcijU6T9Keaw";
        private $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            } catch (PDOException $exception) {
                echo "Erro ao conectar ao banco <<";
            }
            
            return $this->conn;
        }
    }
    
?>