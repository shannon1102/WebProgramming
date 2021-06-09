<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
        $server = 'localhost';
        $user = 'phppgm';
        $pass = 'mypasswd';
        $table_name = 'Categories';
        $mydb = 'business_service';
        $con = mysqli_connect($server, $user, $pass, $mydb);
        if (mysqli_connect_error()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $sql = "SELECT CategoryID as catid ,Title FROM Categories";
        $result = mysqli_query($con, $sql);
        print '<h1>Business Listing</h1>';
        echo '<form method="GET" action="biz_listing.php">';
        echo '<div class="biz_list-container">';
        print '<div class = "container-categories">';
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo '<form method="GET" action="biz_listing.php">';
            echo '<table cellpadding="0" cellspacing="0" class="db-table">';
//            echo '<tr>Click on a category to find business</tr>';
            echo '<tr><th>Click on a category to find business</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {

                foreach ($result as $cat) {
                    echo "<tr><th><a href=\"?cat_id={$cat['catid']}\"> {$cat['Title']} </a></th></tr>";
                    // print_r($cat);
                }
            }

            echo '</table><br />';
            echo '</form>';
        }
        print '</div>';

        //Print biz part

        if (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
            // print_r($cat_id);
            $sql2 = "SELECT B.*, BC.* from Businesses AS B
            JOIN Biz_Categories BC on B.BusinessID = BC.BusinessID
            JOIN Categories c on c.CategoryID = BC.CategoryID
            WHERE c.CategoryID = $cat_id";
            
            $result2 = mysqli_query($con, $sql2);
//            echo '<tr><th>CatID</th><th>Title</th><th>Description</th></tr>';
            print '<table class="biz-list-table">';
            while ($row = mysqli_fetch_assoc($result2)) {

                echo '<tr>';
                foreach ($row as $field) {
                    print '<td>' . $field . '</td>';
                }
                echo '</tr>';
            }
            print '</table>';

        }
       
  
        ?>

    </body>
</html>