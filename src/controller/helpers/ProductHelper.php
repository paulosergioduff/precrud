<?php

    class ProductHelper
    {
        public static function showProducts($products) {
            $tbody = "";

            foreach ($products as $product) {
                $tbody .= 
                "<tr>
                    <td>$product[id]</td>
                    <td>$product[name]</td>
                    <td>$product[price]</td>
                    <td>$product[description]</td>
                    <td>
                        <a class='btn btn-info' href='?page=product&method=details&id=$product[id]'>Detalhes</a>
                        <a class='btn btn-danger' href='?page=product&method=delete&id=$product[id]'>Excluir</a>
                    </td>
                </tr>"; 
            }

            $productView = file_get_contents('src/view/product.html');
            $productView = str_replace('{{body}}', $tbody, $productView);

            echo $productView;
        }

        public static function formProduct() {
            $productView = file_get_contents('src/view/form.html');
            echo $productView;
        }

        public static function showDetails($product) {
            $id = $product->getId();
            $name = $product->getName();
            $price = $product->getPrice();
            $description = $product->getDescription();

            $form = "
                <form action='?page=product&method=update&id=$id' method='post'>
                <div class='form-group'>
                    <label for='name'>Nome</label>
                    <input class='form-control' id='name' name='name' type='text' value='$name'>
                </div>
                <div class='form-group'>
                    <label for='price'>Preço</label>
                    <input class='form-control' id='price' name='price' type='number' pattern='[0-9]+([,\.][0-9]+)?' min='0' step='any' value='$price'>
                </div>
                <div class='form-group'>
                    <label for='description'>Descrição</label>
                    <input class='form-control' id='description' name='description' type='text' value='$description'>
                </div>
                <br/>                
                <button type='submit' class='btn btn-success'>Salvar</button> 
                <a href='?page=product' type='button' role='button'>Voltar</a>              
                </form>
                
            ";

            echo $form;
        }
    }
?>
