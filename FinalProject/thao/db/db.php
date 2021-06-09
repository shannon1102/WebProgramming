<?php
    $db_servername = "localhost:3307";
    $db_username = "root";
    $db_password = "";
    $db_database = "book1";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>