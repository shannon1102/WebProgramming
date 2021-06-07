<?php
    $db_servername = "localhost";
    $db_username = "phppgm";
    $db_password = "mypasswd";
    $db_database = "bookstore";
    $con = new mysqli($db_servername, $db_username, $db_password, $db_database);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>