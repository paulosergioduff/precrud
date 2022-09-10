<?php
namespace controller;

class DependencyApp
{

    public function controller($page) 
    
    {
        //Este trecho de código é um legado que não foi possível resolver para PSR4.
        // Remova essa implementação da  classe quando esse problema for resolvido
        require_once 'src/controller/'.$page.'.php';
    }

    public function model($page) 
    
    {   
        //Este trecho de código é um legado que não foi possível resolver para PSR4.
        // Remova essa implementação da  classe quando esse problema for resolvido
        require_once 'src/model/'.$page.'.php';
    }

    public function configDB($page) 
    
    {   
        
        require_once 'src/config/connection/'.$page.'.php';
    }

    public function categoryDependecy(){
        //Este trecho de código é um legado que não foi possível resolver para PSR4.
        // Remova essa implementação da  classe quando esse problema for resolvido
        require_once 'src/model/DAO/CategoryDAO.php';
        require_once 'src/model/domain/Category.php';
        require_once 'src/controller/helpers/CategoryHelper.php';
    }

    public function productDependecy(){
        //Este trecho de código é um legado que não foi possível resolver para PSR4.
        // Remova essa implementação da  classe quando esse problema for resolvido
        require_once 'src/model/DAO/ProductDAO.php';
        require_once 'src/model/domain/Product.php';
        require_once 'src/controller/helpers/ProductHelper.php';
    }
}

