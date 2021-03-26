<html>
    <head>
        <title> Convert radian and degree</title>
    </head>
    <body>
    <form action="Convert.php" method="GET">
        <table>
            <tr><font color="red" size="6">Convert radian to degree (or degree to radian): </font><br><Br></tr>
            <tr>
                <td>Value: </td>
                <td>
                    <?php
                        if (!isset($_GET['type'])){
                            print("<input type='text' name='dg' size='3'>");
                        }
                        else {
                            if ($_GET['type']=="radian to degree"){
                                if (isset($_GET['dg'])){
                                    if ($_GET['dg']!="") {
                                        $deg = rad2deg($_GET['dg']);
                                        print("<input type='text' name='dg' size='3' value=\"$_GET[dg]\"> rad");
                                        print(" = $deg degree!");
                                    } else {
                                        print("<input type='text' name='dg' size='3'>");
                                    }
                                } else{
                                    print("<input type='text' name='dg' size='3'>");
                                }
                            } else{
                                if (isset($_GET['dg'])){
                                    if ($_GET['dg']!="") {
                                        $rad = deg2rad($_GET['dg']);
                                        print("<input type='text' name='dg' size='3' value=\"$_GET[dg]\"> degree");
                                        print(" = $rad rad!");
                                    } else {
                                        print("<input type='text' name='dg' size='3'>");
                                    }
                                } else{
                                    print("<input type='text' name='dg' size='3'>");
                                }
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="type" value="radian to degree">
                    <input type="submit" name="type" value="degree to radian">
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>
