<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Table</title>
</head>
<body>
<?php
    $server = 'localhost';
    $user = 'phppgm';
    $pass = 'mypasswd';
    $table_name = 'Products';
    $mydb = 'web_programming';
    $con = mysqli_connect($server, $user, $pass, $mydb);
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $SQLcmd = "CREATE TABLE $table_name(
            ProductID INT UNSIGNED NOT NULL
                AUTO_INCREMENT PRIMARY KEY,
            Product_desc VARCHAR(50),
            Cost INT,
            Weight INT,
            Numb INT
        )";
    if(mysqli_query($con, $SQLcmd)){
        print "<p>$SQLcmd";
    } else {
        print"Noooo";
    }
    mysqli_close($con);
?> 
    
</body>
</html>