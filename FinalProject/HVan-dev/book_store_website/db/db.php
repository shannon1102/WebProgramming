<?php
    $db_servername = "localhost";
    $db_username = "phppgm";
    $db_password = "mypasswd";
    $db_database = "bookstore";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>