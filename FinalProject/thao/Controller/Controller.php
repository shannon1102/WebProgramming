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
       
        }
        elseif (isset($_GET['category'])) {
            $listBookbyCategory = $this->Bookmodel->getlistBookByCate($_GET['category']);
            include 'view/viewCategory.php';     
    }
        elseif (isset($_GET['search'])) {
            $listBookbyName = $this->Bookmodel->getBookByName($_GET['search']);
            include 'view/viewSearchlistBook.php';     
    }
        
        else {
//            $total = $this->Bookmodel->getTotal();
            $books = $this->Bookmodel->getBookList();
            include 'view/booklist.php';
          
        }
    }

}
