<?php
    $db_servername = "localhost:3307";
    $db_username = "root";
    $db_password = "";
    $db_database = "books";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    function connectDatabase(){
        $conn = new mysqli("localhost:3307", "root", "", "books");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>