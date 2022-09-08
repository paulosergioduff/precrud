<?php

    class Product
    {
        private $id;
        private $name;
        private $price;
        private $description;
        private $categoria;
        private $quantidade;
        private $codigo;

        public function __construct() {
        }

        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }
    
        public function setName($name) {
            $this->name = $name;
        }

        public function getPrice() {
            return $this->price;
        }
    
        public function setPrice($price) {
            $this->price = $price;
        }

        public function getDescription() {
            return $this->description;
        }
    
        public function setDescription($description) {
            $this->description = $description;
        }

        public function getCategoria() {
            return $this->categoria;
        }
    
        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }
    
        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }


        public function getCodigo() {
            return $this->codigo;
        }
    
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
    }    
?>