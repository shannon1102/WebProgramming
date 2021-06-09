<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntityBook
 *
 * @author Admin
 */
class EntityBook {
   public $BookID;
   public $Price;
   public $Name;
   public $Description;
   public $Instock;
   public $ImageURL;
   public $Category;
   public $Author;
   

public function __construct($_BookID,$_Price,$_Name,$_Description,$_Instock,$_ImageURL,$_Category,$_Author) {
    $this->BookID = $_BookID;
    $this->Price = $_Price;
    $this->Name = $_Name;
    $this->Description=$_Description;
    $this->Instock = $_Instock;
    $this->ImageURL=$_ImageURL;
    $this->Category = $_Category;
    $this->Author = $_Author;
}
}