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
        <h1>Business Registration</h1>
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
        if (isset($_POST['name'])) {
//            echo "Aloalo\n";
            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $telephone = $_POST['telephone'];
            $url = $_POST['url'];
            $cateArr = $_POST['cates'];
            $countCates = count($cateArr);
            $tempCateId = array();
            $finalStr = "";
            for ($i = 0; $i < $countCates; $i++) {
                $cateStr = "Title" . "=" . "'" . $cateArr[$i] . "'";
                if ($i == $countCates - 1) {
                    $finalStr .= $cateStr;
                } else {
                    $finalStr .= $cateStr . " OR ";
                }
            }
            if ($name && $telephone) {
                if (mysqli_connect_error()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                $sql = "INSERT INTO Businesses (Name,Address,City,Telephone,URL) VALUES ('$name','$address','$city','$telephone','$url');";
                $result = mysqli_query($con, $sql);
                $lastBiz = mysqli_insert_id($con);
                if ($countCates == 0) {
                    echo '<p>Noslected<p>';
                } else {
                    $sql2 = "SELECT CategoryID from Categories WHERE " . $finalStr;
                }
                $result2 = mysqli_query($con, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result2)) {
                        foreach ($row as $field) {
                            $sql3 = "INSERT INTO Biz_Categories(BusinessID,CategoryID) VALUES($lastBiz,$field)";
                            $result3 = mysqli_query($con, $sql3);
                        }
                    }
                }
            }
        }
        $sql = "SELECT Title FROM Categories";
        $result = mysqli_query($con, $sql);
        echo '<form method="POST" action="add_biz.php">';
//        print '<form method="POST" action="add_biz.php>';
        print '<div id = "business" class = "container">';
        if (mysqli_num_rows($result) > 0) {
            // output data of each row

            print '<div class = "scroll-div">';
            print '<p>Click on one or click multiple categories</p>';
            print '<select name="cates[]" multiple="multiple">';

            while ($row = mysqli_fetch_assoc($result)) {

                foreach ($row as $field) {
                    print '<option value="' . $field . '" >' . $field . ' </option>';
                }
            }
            print '</select>';
            print '</div>';
        }


        print'<div class = "form-div">';
        print'<table>';
        print'<tr>';
        print'<td>Business Name:</td>';
        print'<td><input type = "text" size = "50" maxlength = "50" id = "name" name = "name"><br>';
        print'</tr>';
        print'<tr>';
        print'<td>Address:</td>';
        print'<td><input type = "text" size = "50" maxlength = "50" id = "address" name = "address"><br>';
        print'</tr>';
        print'<tr>';
        print'<td>City:</td>';
        print'<td><input type = "text" size = "50" maxlength = "50" id = "city" name = "city"><br>';
        print'</tr>';
        print'<tr>';
        print'<td>Telephone:</td>';
        print'<td><input type = "text" size = "50" maxlength = "50" id = "telephone" name = "telephone"><br>';
        print'</tr>';
        print'<tr>';
        print'<td>URL:</td>';
        print'<td><input type = "text" size = "50" maxlength = "50" id = "url" name = "url"><br>';
        print'</tr>';
        print'</table>';
        print '</div>';
        print '</div>';
        print '<br>';
        print '<div class="submit">';
        print '<input type = "submit" value = "submit">';
        print '</div>';
        print '</form>';
        ?>

    </body>
</html>