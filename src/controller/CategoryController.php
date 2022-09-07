<?php

    require_once 'src/model/DAO/CategoryDAO.php';
    require_once 'src/model/domain/Category.php';
    require_once 'src/controller/helpers/CategoryHelper.php';

    class CategoryController 
    {
        public function index() {
           
            $categoryDAO = new CategoryDAO();
            $stmt = $categoryDAO->getAll();
            $result = $stmt->rowCount();
            $category_arr = array();

            if($result > 0) {             
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);

                    $category_item = array(
                        "id" => $id,
                        "name" => $name,
                        "codigo" => $codigo,
                    );

                    array_push($category_arr, $category_item);
                }
            }

            CategoryHelper::showCategorys($category_arr);
        }

        public function add() {
            CategoryHelper::formCategory();
            $category = new Category();

            if(isset($_POST['name'], $_POST['codigo'])) {
                $category->setName($_POST['name']);
                $category->setCodigo($_POST['codigo']);

                if(!empty($category->getName())) {
                    $categoryDAO = new CategoryDAO();
                    $stmt = $categoryDAO->insert($category);

                    if($stmt) {
                       header("Location: ?page=category&method=index");
                    }
                } else {
                    echo "Informe os dados.";
                }                     
            }
        }

        public function update() {            
            $category = new Category();
            $category->setId($_GET['id']);

            if(isset($_POST['name'], $_POST['codigo'])) {
                $category->setName($_POST['name']);
                $category->setCodigo($_POST['codigo']);
                
                $categoryDAO = new CategoryDAO();
                $stmt = $categoryDAO->update($category);

                if($stmt) {
                    header("Location: ?page=category&method=index");
                }
            }
        }

        public function details() {
            $category = new Category();
            $categoryDAO = new CategoryDAO();
            $category->setId($_GET['id']);

            $stmt =  $categoryDAO->getId($category);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(isset($row['id'])) {
                $category->setId($row['id']);
                $category->setName($row['name']);
                $category->setCodigo($row['codigo']);               
    
                CategoryHelper::showDetails($category);
            } 
        }

        public function delete() {
            $category = new Category();
            $categoryDAO = new CategoryDAO();
            $category->setId($_GET['id']);
            $stmt =  $categoryDAO->delete($category);

            if($stmt) {
                header("Location: ?page=category&method=index");
            }
        }
    }
?>
