<?php

include"EntityBook.php";
include "connect.php";

class Bookmodel {

    public function getBookList() {
        $host = "localhost";
        $uname = "root";
        $pwd = '';
        $db_name = "webprogramming";

        $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error());
        mysqli_select_db($con, $db_name) or die("Could not select the databse." . mysqli_error());
        $sql = "SELECT * FROM books";
        $result = mysqli_query($con, $sql);
        $books = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($books, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
//       print_r($books);
        return $books;
    }

    public function getBook($book_id) {
        $host = "localhost:3307";
        $uname = "root";
        $pwd = '';
        $db_name = "book1";

        $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error());
        mysqli_select_db($con, $db_name) or die("Could not select the databse." . mysqli_error());

        $sql = " select * from books where BookID = $book_id";
        $book = array();
        $result = mysqli_query($con, $sql);
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
//        $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error());
//        mysqli_select_db($con, $db_name) or die("Could not select the databse." . mysqli_error());
//
//        $sql = " select count(*) from books";
//        $result = mysqli_query($con, $sql);
//        return $result;
//    }

    public function getlistBookByCate($category) {
         $host = "localhost:3307";
        $uname = "root";
        $pwd = '';
        $db_name = "book1";

        $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error());
        mysqli_select_db($con, $db_name) or die("Could not select the databse." . mysqli_error());
        $sql = "SELECT * FROM books where Category ='".$category."'";
        $result = mysqli_query($con, $sql);
        $lbooks = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lbooks, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
        return $lbooks;
    }
    public function getBookByName($search) {
        $host = "localhost:3307";
        $uname = "root";
        $pwd = '';
        $db_name = "book1";

        $con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error());
        mysqli_select_db($con, $db_name) or die("Could not select the databse." . mysqli_error());
        $sql = "SELECT * FROM books WHERE Name LIKE '$search%'";
        $result = mysqli_query($con, $sql);
        $lbooks = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lbooks, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
        return $lbooks;
            
        
        
    }

}
