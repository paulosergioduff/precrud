<?php
class CategoryHelper
{
    public static function showCategorys($categorys)
    {
        $tbody = "";

        foreach ($categorys as $category)
        {
            $tbody .= "<tr>
                    <td>$category[id]</td>
                    <td>$category[name]</td>
                    <td>$category[codigo]</td>
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

    public static function formCategory()
    {
        $categoryView = file_get_contents('src/view/formCategoria.html');
        echo $categoryView;
    }

    public static function showDetails($category)
    {
        $id = $category->getId();
        $name = $category->getName();
        $codigo = $category->getCodigo();

        $form = "
        <script type=\"text/javascript\">
            function onlynumber(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            //var regex = /^[0-9.,]+$/;
            var regex = /^[0-9.]+$/;
                if( !regex.test(key) ) {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
            }
        </script>
                <form action='?page=category&method=update&id=$id' method='post'>
                <div class='form-group'>
                    <label for='name'>Nome</label>
                    <input class='form-control' id='name' name='name' type='text' value='$name'>
                </div>
                <div class='form-group'>
                    <label for='codigo'>Código</label>
                    <input class='form-control' id='codigo' name='codigo' value='$codigo'>
                </div>
                <br/>                
                <button type='submit' class='btn btn-success'>Salvar</button> 
                <a href='?page=category' type='number' pattern='[0-9]+([,\.][0-9]+)?' placeholder=\"Código de barras\"  onkeypress=\"return onlynumber();\" role='button'>Voltar</a>              
                </form>
                
            ";

        echo $form;
    }
}
?>
