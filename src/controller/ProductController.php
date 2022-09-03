<?php

    require_once 'src/model/DAO/ProductDAO.php';
    require_once 'src/model/domain/Product.php';
    require_once 'src/controller/helpers/ProductHelper.php';

    class ProductController 
    {
        public function index() {
           
            $productDAO = new ProductDAO();
            $stmt = $productDAO->getAll();
            $result = $stmt->rowCount();
            $product_arr = array();

            if($result > 0) {             
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);

                    $product_item = array(
                        "id" => $id,
                        "name" => $name,
                        "price" => $price,
                        "description" => $description,
                    );

                    array_push($product_arr, $product_item);
                }
            }

            ProductHelper::showProducts($product_arr);
        }

        public function add() {
            ProductHelper::formProduct();
            $product = new Product();

            if(isset($_POST['name'], $_POST['price'],$_POST['description'])) {
                $product->setName($_POST['name']);
                $product->setPrice($_POST['price']);
                $product->setDescription($_POST['description']);
                
                $typeFile = strtolower(substr($_FILES['image']['name'], -4));
                $fileName = md5(time()).$typeFile;
                $filePath = '/opt/lampp/htdocs/www/php-crud/src/assets/img/';

                move_uploaded_file($_FILES['image']['tmp_name'], $filePath.$fileName);

                $product->setImage($fileName);

                if(!empty($product->getName())) {
                    $productDAO = new ProductDAO();
                    $stmt = $productDAO->insert($product);

                    if($stmt) {
                        header("Location: ?page=product&method=index");
                    }
                } else {
                    echo "Informe os dados.";
                }                     
            }
        }

        public function update() {            
            $product = new Product();
            $product->setId($_GET['id']);

            if(isset($_POST['name'], $_POST['price'],$_POST['description'])) {
                $product->setName($_POST['name']);
                $product->setPrice($_POST['price']);
                $product->setDescription($_POST['description']);
                
                $productDAO = new ProductDAO();
                $stmt = $productDAO->update($product);

                if($stmt) {
                    header("Location: ?page=product&method=index");
                }
            }
        }

        public function details() {
            $product = new Product();
            $productDAO = new ProductDAO();
            $product->setId($_GET['id']);

            $stmt =  $productDAO->getId($product);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(isset($row['id'])) {
                $product->setId($row['id']);
                $product->setName($row['name']);
                $product->setPrice($row['price']);
                $product->setDescription($row['description']);               
    
                ProductHelper::showDetails($product);
            } 
        }

        public function delete() {
            $product = new Product();
            $productDAO = new ProductDAO();
            $product->setId($_GET['id']);
            $stmt =  $productDAO->delete($product);

            if($stmt) {
                header("Location: ?page=product&method=index");
            }
        }
    }
?>
