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

        $sql1 = "SELECT Product_desc FROM Products";
        $sql = "SELECT * FROM Products";
        $result1 = mysqli_query($con, $sql1);
        $result = mysqli_query($con, $sql);

        print '<font size="5" color="blue"> Select Product We Just Sold </font><br>';
        if (mysqli_num_rows($result1) > 0) {
            // output data of each row

            print '<form action="sale.php" method="POST">';
            while ($row = mysqli_fetch_assoc($result1)) {
                foreach ($row as $value) {

                    print '<label for="' . $value . '">';
                    print $value;
                    print '</label>';
                    print '<input type="radio" id="' . $value . '" name="product_desc" value="' . $value . '">';
                }
            }
            print '<br>';
            print '<input type="submit" value="submit">';
            print '<input type="reset" value="reset">';
            print '</form>';
        }

        echo '<h3>', $table_name, '</h3>';
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo '<table cellpadding="0" cellspacing="0" class="db-table">';
            echo '<tr><th>Numb</th><th>Product</th><th>Cost</th><th>Weight</th><th>Count</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {

                echo '<tr>';
                foreach ($row2 as $key => $value) {
                    echo '<td>', $value, '</td>';
                }
                echo '</tr>';
            }
            echo '</table><br />';
        } else {
            echo "0 results";
        }
        mysqli_close($con);
        ?> 

    </body>
</html>