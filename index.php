<?php

require 'vendor/autoload.php';

use \controller\HomeController;
use \controller\ErroController;
use \controller\DependencyApp;

$appDependency = new DependencyApp();
$appDependency->controller('ProductController');

    ob_start();
        $app = new HomeController();
        $app->start($_GET);
        $page = ob_get_contents();
    ob_end_clean();

    $template = file_get_contents('src/view/home.html');
    $template = str_replace('{{content}}', $page, $template);
    
    echo $template;
?>