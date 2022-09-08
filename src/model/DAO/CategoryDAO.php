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

        public function getId($category) {
            $query = "SELECT
                    id, name, codigo
                FROM
                    " . $this->table . "
                WHERE id = :id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":id", $category->getId());
            $stmt->execute();
            return $stmt;            
        }

        public function insert($category) {
             $query = "INSERT INTO
                    " . $this->table . "
                SET
                name=:name,codigo=:codigo";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $category->setName(htmlspecialchars(strip_tags($category->getName())));
            $category->setCodigo(htmlspecialchars(strip_tags($category->getCodigo())));

            // bind de valores
            $stmt->bindValue(":name", $category->getName());
            $stmt->bindValue(":codigo", $category->getCodigo());
            

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }


        public function update($category) {
            $query = "UPDATE
            " . $this->table . "
            SET
                name=:name,codigo=:codigo
            WHERE
                id = :id";

            $stmt = $this->conn->prepare($query);

            // Evita encode não reconhecido pelo html(<, &, ect)
            $category->setId(htmlspecialchars(strip_tags($category->getId())));
            $category->setName(htmlspecialchars(strip_tags($category->getName())));
            $category->setCodigo(htmlspecialchars(strip_tags($category->getCodigo())));


            // bind de valores
            $stmt->bindValue(":id", $category->getId());
            $stmt->bindValue(":name", $category->getName());
            $stmt->bindValue(":codigo", $category->getCodigo());

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        public function delete($category) {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $category->setId(htmlspecialchars(strip_tags($category->getId())));
            $stmt->bindValue(":id", $category->getId());

            if($stmt->execute()){
                return true;
            }
        
            return false;
        }
    }   
?>