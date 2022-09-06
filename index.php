<?php
    require_once 'src/controller/HomeController.php';
    require_once 'src/controller/ProductController.php';
    require_once 'src/controller/ErroController.php';

    ob_start();
        $app = new HomeController();
        $app->start($_GET);
        $page = ob_get_contents();
    ob_end_clean();

    $template = file_get_contents('src/view/categoria.html');
    $template = str_replace('{{content}}', $page, $template);
    
    echo $template;
?>
