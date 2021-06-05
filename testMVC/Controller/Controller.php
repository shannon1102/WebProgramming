<?php

include_once("Model/Bookmodel.php");

class controller {

    public $Bookmodel;

    public function __construct() {
        $this->Bookmodel = new Bookmodel();
    }

    public function invoke() {
        if (isset($_GET['bookid'])) {
            $book=  $this->Bookmodel->getBook($_GET['bookid']);
            include 'view/viewbook.php';
       
        } else {
            $total = $this->Bookmodel->getTotal();
            $books = $this->Bookmodel->getBookList();
            include 'view/booklist.php';
          
        }
    }

}
