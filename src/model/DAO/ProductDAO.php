<?php

use \controller\DependencyApp;

$appDependency = new DependencyApp();
$appDependency->configDB('Database');
    

    class ProductDAO
    {
        private $table = "tbproduct";
        private $database;
        private $conn;

        public function __construct() {
            $this->database = new Database();
            $this->conn = $this->database->getConnection();
        }

        public function getAll() {
            $query = "SELECT
                    id, name, price, description, categoria, quantidade, codigo
                FROM
                    " . $this->table . "
                ORDER BY id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function getId($product) {
            $query = "SELECT
                    id, name, price, description, categoria, quantidade, codigo
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
                name=:name,price=:price,description=:description,categoria=:categoria,quantidade=:quantidade,codigo=:codigo";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $product->setName(htmlspecialchars(strip_tags($product->getName())));
            $product->setPrice(htmlspecialchars(strip_tags($product->getPrice())));
            $product->setDescription(htmlspecialchars(strip_tags($product->getDescription())));
            $product->setCategoria(htmlspecialchars(strip_tags($product->getCategoria())));
            $product->setQuantidade(htmlspecialchars(strip_tags($product->getQuantidade())));
            $product->setCodigo(htmlspecialchars(strip_tags($product->getCodigo())));

            // bind de valores
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":price", $product->getPrice());
            $stmt->bindValue(":description", $product->getDescription());
            $stmt->bindValue(":categoria", $product->getCategoria());
            $stmt->bindValue(":quantidade", $product->getQuantidade());
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
                name=:name,price=:price,description=:description,categoria=:categoria,quantidade=:quantidade,codigo=:codigo
            WHERE
                id = :id";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $product->setId(htmlspecialchars(strip_tags($product->getId())));
            $product->setName(htmlspecialchars(strip_tags($product->getName())));
            $product->setPrice(htmlspecialchars(strip_tags($product->getPrice())));
            $product->setDescription(htmlspecialchars(strip_tags($product->getDescription())));
            $product->setCategoria(htmlspecialchars(strip_tags($product->getCategoria())));
            $product->setQuantidade(htmlspecialchars(strip_tags($product->getQuantidade())));
            $product->setCodigo(htmlspecialchars(strip_tags($product->getCodigo())));

            // bind de valores
            $stmt->bindValue(":id", $product->getId());
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":price", $product->getPrice());
            $stmt->bindValue(":description", $product->getDescription());
            $stmt->bindValue(":categoria", $product->getCategoria());
            $stmt->bindValue(":quantidade", $product->getQuantidade());
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