<?php
    require "product.php";

    class Db {
        public $listProduct = array();

        function __construct() {
            $product = new Product("Access 2003", "Microsoft Corp", "0000", "Window", "https://i.ytimg.com/vi/k6eLcgWmZ04/hqdefault.jpg");
            $this->listProduct[] = $product;
            unset($product);

            $product = new Product("Excel 2003", "Microsoft Corp", "0001", "Window", "https://phanmemfree.org/image/Cong-Cu/Microsoft-Excel.jpg");
            $this->listProduct[] = $product;
            unset($product);

            $product = new Product("Word 2003", "Microsoft Corp", "0002", "Window", "https://hpconnect.vn/wp-content/uploads/2020/04/Word-2010.jpg");
            $this->listProduct[] = $product;
            unset($product);

            $product = new Product("PowerPoint 2003", "Microsoft Corp", "0002", "Window", "https://www.academiaalcantara.es/wp-content/uploads/2019/05/powerpoint-2016.png");
            $this->listProduct[] = $product;
            unset($product);
        }

        function get_product_by_id($id){
            return $this->listProduct[$id-1];
        }

        function get_all_products($selected){
            foreach($this->listProduct as $i){
                if($i instanceof Product){
                    if($i->getId() == $selected){
                        print ("<option value='". $i->getId() ."' selected>". $i->name ."</option>");
                    }
                    else {
                        print ("<option value='". $i->getId() ."'>". $i->name ."</option>");
                    }
                }
            }
        }
    }
?>