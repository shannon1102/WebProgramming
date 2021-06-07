<?php

include"EntityBook.php";
include "../connect.php";

class Bookmodel {
    public $db;
  

    public function getBookList() {
        // $host = "localhost:3307";
        // $uname = "root";
        // $pwd = '';
        // $db_name = "book1";
        // $host = "localhost";
        // $uname = "phppgm";
        // $pwd = "mypasswd";
        // $db_name = "bookstore";


        // $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database.");
        // mysqli_select_db($con, $db_name) or die("Could not select the databse.");
        $this->db = $con;
        $sql = "SELECT * FROM books";
        $result =  $con->query($sql);
        $books = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($books, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
//       print_r($books);
        return $books;
    }

    public function getBook($book_id) {
        // $host = "localhost:3307";
        // $uname = "root";
        // $pwd = '';
        // $db_name = "book1";

        // $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database.");
        mysqli_select_db($con, $db_name) or die("Could not select the databse.");

        $sql = " select * from books where BookID = $book_id";
        $book = array();
        $result =  $conn->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $book = (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']);
        }
//       print_r($book);
        return $book;
    }
//
//    public function getTotal() {
//        $host = "localhost:3307";
//        $uname = "root";
//        $pwd = '';
//        $db_name = "book1";
//        $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database.");
//        mysqli_select_db($con, $db_name) or die("Could not select the databse.");
//
//        $sql = " select count(*) from books";
//        $result =  $conn->query($sql);
//        return $result;
//    }

    public function getlistBookByCate($category) {
        //  $host = "localhost:3307";
        // $uname = "root";
        // $pwd = '';
        // $db_name = "book1";

        // $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database.");
        mysqli_select_db($con, $db_name) or die("Could not select the databse.");
        $sql = "SELECT * FROM books where Category ='".$category."'";
        $result =  $con->query($sql);
        $lbooks = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lbooks, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
        return $lbooks;
    }
    public function getBookByName($search) {
        // $host = "localhost:3307";
        // $uname = "root";
        // $pwd = '';
        // $db_name = "book1";

        // $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database.");
        mysqli_select_db($con, $db_name) or die("Could not select the databse.");
        $sql = "SELECT * FROM books WHERE Name LIKE '$search%'";
        $result =  $con->query($sql);
        $lbooks = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lbooks, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
        return $lbooks;
            
        
        
    }

}
