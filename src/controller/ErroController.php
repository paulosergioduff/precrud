<?php
namespace controller;

class ErroController
{
    public function index()
    {
        $erroView = file_get_contents('src/view/erro.html');
        echo $erroView;
    }
}
?>
