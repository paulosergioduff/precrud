<?php
namespace controller;

class DependencyApp
{

    public function controller($page) 
    
    {
        //Este trecho de código é um legado que não foi possível converter para PSR4.
        // Remova essa classe quando esse problema for resolvido
        require_once 'src/controller/'.$page.'.php';
    }

    public function model($page) 
    
    {   
        //Este trecho de código é um legado que não foi possível converter para PSR4.
        // Remova essa classe quando esse problema for resolvido
        require_once 'src/model/'.$page.'.php';
    }

    public function configDB($page) 
    
    {   
        //Este trecho de código é um legado que não foi possível converter para PSR4.
        // Remova essa classe quando esse problema for resolvido
        require_once 'src/config/connection/'.$page.'.php';
    }
}

