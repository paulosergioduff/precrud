<?php
    
    require_once 'src/config/connection/Database.php';

    class CategoryDAO
    {
        private $table = "categoria";
        private $database;
        private $conn;

        public function __construct() {
            $this->database = new Database();
            $this->conn = $this->database->getConnection();
        }

        public function getAll() {
            $query = "SELECT
                    id, name, codigo
                FROM
                    " . $this->table . "
                ORDER BY id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function getId($product) {
            $query = "SELECT
                    id, name, codigo
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
                name=:name,codigo=:codigo";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $product->setName(htmlspecialchars(strip_tags($product->getName())));
            $product->setCodigo(htmlspecialchars(strip_tags($product->getCodigo())));

            // bind de valores
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":codigo", $product->getCodigo());
            

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }


        public function update($product) {
            $query = "UPDATE
            " . $this->table . "
            SET
                name=:name,codigo=:codigo
            WHERE
                id = :id";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $product->setId(htmlspecialchars(strip_tags($product->getId())));
            $product->setName(htmlspecialchars(strip_tags($product->getName())));
            $product->setCodigo(htmlspecialchars(strip_tags($product->getCodigo())));


            // bind de valores
            $stmt->bindValue(":id", $product->getId());
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":codigo", $product->getCodigo());

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