<?php

include"EntityBook.php";
include "./db/db.php";

class Bookmodel {

    public function getBookList() {

        $conn = connectDatabase();
        $sql = "SELECT * FROM books";

        $result = $conn->query($sql);
        $books = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($books, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }

        return $books;
    }

    public function getBook($book_id) {

        $conn = connectDatabase();
        $sql = " select * from books where BookID = $book_id";
        $result = $conn->query($sql);
        $book = array();

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $book = (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']);
        }

        return $book;
    }

    public function getlistBookByCate($category) {
        $conn = connectDatabase();


        $sql = "SELECT * FROM books where Category ='" . $category . "'";
        $result = $conn->query($sql);

        $lbooks = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lbooks, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
        return $lbooks;
    }

    public function getBookByName($search) {
        $conn = connectDatabase();
    $sql = "SELECT * FROM books WHERE Name LIKE '%$search%'";
        $result = $conn->query($sql);
    

        $lbooks = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lbooks, (array) new EntityBook($row['BookID'], $row['Price'], $row['Name'], $row['Description'], $row['Instock'], $row['ImageURL'], $row['Category'], $row['Author']));
        }
        return $lbooks;
    }

}
