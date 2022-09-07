<?php

    class Category
    {
        private $id;
        private $name;
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

        public function getCodigo() {
            return $this->codigo;
        }
    
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
    }    
?>