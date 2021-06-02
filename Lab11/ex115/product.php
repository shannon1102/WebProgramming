<?php
    class Product {
        private static $total = 0;
        private $id;
        public $name;
        public $publisher;
        public $sku;
        public $platform;
        public $img;

    function __construct($name, $publisher, $sku, $platform, $img){
        $this->id = ++self::$total;
        $this->name = $name;
        $this->publisher = $publisher;
        $this->sku = $sku;
        $this->platform = $platform;
        $this->img = $img;
    }

    function getId(){
        return $this->id;
    }

    function getSum(){ 
        return self::$total;
    }
}
?>