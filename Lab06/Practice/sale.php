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
    $con = mysqli_connect($server,$user,$pass,$mydb);
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    if(isset($_POST['product_desc'])) {
         $product_desc = $_POST["product_desc"];
    }
    $sql1 = "UPDATE $table_name SET  Numb = ( Numb - 1 ) WHERE Product_desc='$product_desc'";
    $result1 = mysqli_query($con, $sql1);
    if($result1) {
        print "The query is <i>$sql1</i><br>";
    }
    
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($con, $sql);
    echo '<h3>',$table_name,'</h3>';
    print '<font size="5" color="blue"> Update Result for Table Products </font><br>';

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Numb</th><th>Product</th><th>Cost</th><th>Weight</th><th>Count</th></tr>';
        while($row = mysqli_fetch_assoc($result)) {
	      
            echo '<tr>';
			foreach($row as $value) {
				echo '<td>',$value,'</td>';
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