<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Table</title>
        <<link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <h1>Categories Administration</h1>
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
        if (isset($_POST['newTitle'])) {
            $newTitle = $_POST['newTitle'];
            $newDesc = $_POST['newDesc'];
            
            if ($newTitle && $newDesc) {
                if (mysqli_connect_error()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                $sql = "INSERT INTO Categories (Title,Description) VALUES ('$newTitle','$newDesc');";
                echo $sql;
                $result = mysqli_query($con, $sql);
                print_r("end insert");
            }
            // mysqli_close($con);
        }

        $sql = "SELECT * FROM Categories";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo '<form method="POST" action="admin.php">';
            echo '<table cellpadding="0" cellspacing="0" class="db-table">';
            echo '<tr><th>CatID</th><th>Title</th><th>Description</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {

                echo '<tr>';
                foreach ($row as $field) {
                    print '<td>' . $field . '</td>';
                }
                echo '</tr>';
            }

            print '<tr>';
            print '<td><input type="text" name="newCart"/></td>';
            print '<td><input type="text" name="newTitle"/></id>';
            print '<td><input type="text" name="newDesc"/></id>';

            print '</tr>';
            echo '</table><br />';

            print '<input type="submit" value="submit" onclick="insert">';
            echo '</form>';
        } else {
            echo "0 results";
        }
        ?> 

    </body>
</html>