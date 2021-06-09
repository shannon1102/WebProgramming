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

        $connect = mysqli_connect($server, $user, $pass, $mydb);
        $table_name = 'Products';
        if (isset($_GET['product_desc']) || isset($_GET['cost']) || isset($_GET['weight']) || isset($_GET['numb']))
            $Item = $_GET['product_desc'];
        $Weight = $_GET['cost'];
        $Cost = $_GET['weight'];
        $Quantity = $_GET['numb'];
        $query = "INSERT INTO $table_name(Product_desc,Cost,Weight,Numb) VALUES ('$Item','$Cost','$Weight','$Quantity')";
        print "The Query is <i>$query</i><br>";
        mysqli_select_db($connect, $mydb);
        print '<br><font size="4" color="blue">';
        if (mysqli_query($connect, $query)) {
            print "Insert into $mydb was successful!</font>";
        } else {
            print "Insert into $mydb failed!</font>";
        }
        mysqli_close($connect);
//    
        ?></body>

    ?> 

</body>
</html>