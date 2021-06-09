<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author Admin
 */
include_once("model/Model.php");  
class controller {
             public $model;   
	  
	     public function __construct()  
	     {  
	          $this->model = new Model();  
	     }   
	  
	     public function invoke()  
	     {  
	          if (!isset($_GET['book']))  
	          {  
	               // no special book is requested, we'll show a list of all available books  
	               $books = $this->model->getBookList();  
	               include 'view/booklist.php'; 
	          } 
	          else 
	          { 
	               // show the requested book 
	               $book = $this->model->getBook($_GET['book']); 
	               include 'view/viewbook.php';  
	          }  
	     }  

}
