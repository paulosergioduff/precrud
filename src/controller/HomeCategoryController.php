<?php
class HomeController
{
    public function start($urlGet)
    {

        if (isset($urlGet['page']))
        {
            $controller = ucfirst($urlGet['page'] . 'Controller');
        }
        else
        {
            $controller = 'CategoryController';
        }

        if (isset($urlGet['method']))
        {
            $action = lcfirst($urlGet['method']);
        }
        else
        {
            $action = 'index';
        }

        if (!class_exists($controller))
        {
            $controller = 'ErroController';
        }

        if ($action !== 'index' && $action !== 'add' && $action !== 'update' && $action !== 'details' && $action !== 'delete')
        {
            $controller = 'ErroController';
            $action = 'index';
        }

        call_user_func_array(array(
            $controller,
            $action
        ) , array());

    }
}
?>
