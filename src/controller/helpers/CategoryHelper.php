<?php

    class CategoryHelper
    {
        public static function showCategorys($categorys) {
            $tbody = "";

            foreach ($categorys as $category) {
                $tbody .= 
                "<tr>
                    <td>$category[id]</td>
                    <td>$category[name]</td>
                    <td>$category[price]</td>
                    <td>$category[description]</td>
                    <td>
                        <a class='btn btn-info' href='?page=category&method=details&id=$category[id]'>Detalhes</a>
                        <a class='btn btn-danger' href='?page=category&method=delete&id=$category[id]'>Excluir</a>
                    </td>
                </tr>"; 
            }

            $categoryView = file_get_contents('src/view/listaCategoria.html');
            $categoryView = str_replace('{{body}}', $tbody, $categoryView);

            echo $categoryView;
        }

        public static function formCategory() {
            $categoryView = file_get_contents('src/view/formCategoria.html');
            echo $categoryView;
        }

        public static function showDetails($category) {
            $id = $category->getId();
            $name = $category->getName();
            $price = $category->getPrice();
            $description = $category->getDescription();

            $form = "
                <form action='?page=category&method=update&id=$id' method='post'>
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
                <a href='?page=category' type='button' role='button'>Voltar</a>              
                </form>
                
            ";

            echo $form;
        }
    }
?>
