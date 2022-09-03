<?php
    
    require_once 'src/config/connection/Database.php';

    class ProductDAO
    {
        private $table = "produtos";
        private $database;
        private $conn;

        public function __construct() {
            $this->database = new Database();
            $this->conn = $this->database->getConnection();
        }

        public function getAll() {
            $query = "SELECT
                    id, name, price, description
                FROM
                    " . $this->table . "
                ORDER BY id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function getId($product) {
            $query = "SELECT
                    id, name, price, description
                FROM
                    " . $this->table . "
                WHERE id = :id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $product->getId());
            $stmt->execute();
            return $stmt;            
        }

        public function insert($product) {
             $query = "INSERT INTO
                    " . $this->table . "
                SET
                name=:name,price=:price,description=:description, image=:image";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $product->setName(htmlspecialchars(strip_tags($product->getName())));
            $product->setPrice(htmlspecialchars(strip_tags($product->getPrice())));
            $product->setDescription(htmlspecialchars(strip_tags($product->getDescription())));
            $product->setImage(htmlspecialchars(strip_tags($product->getImage())));

            // bind de valores
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":price", $product->getPrice());
            $stmt->bindValue(":description", $product->getDescription());
            $stmt->bindValue(":image", $product->getImage());
            

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        public function update($product) {
            $query = "UPDATE
            " . $this->table . "
            SET
                name=:name,price=:price,description=:description
            WHERE
                id = :id";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $product->setId(htmlspecialchars(strip_tags($product->getId())));
            $product->setName(htmlspecialchars(strip_tags($product->getName())));
            $product->setPrice(htmlspecialchars(strip_tags($product->getPrice())));
            $product->setDescription(htmlspecialchars(strip_tags($product->getDescription())));

            // bind de valores
            $stmt->bindValue(":id", $product->getId());
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":price", $product->getPrice());
            $stmt->bindValue(":description", $product->getDescription());

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        public function delete($product) {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $product->setId(htmlspecialchars(strip_tags($product->getId())));
            $stmt->bindValue(":id", $product->getId());

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }
    }   
?>