<?php

include 'connect.php';


$host = "localhost:3307";
$uname = "root";
$pwd = '';
$db_name = "book1";

$con = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error());
mysqli_select_db($con, $db_name) or die("Could not select the databse." . mysqli_error());
$search = $_GET['search'];
$sql = "SELECT * FROM books WHERE Name LIKE '%$search%'";


$result = mysqli_query($con, $sql);



while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='index.php?search=" . utf8_encode($row['Name']) . "'>" . $row['Name'] . "</a>";
}
?>