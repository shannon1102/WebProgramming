<html>
<head><title> Distance from Chicago! </title></head>
<body>
<font size=4 color=blue> Welcome to the Distance Caculation Page. </font>
<br>The page that calculates the distances from Chicago! <br>
<br>Select a destination:
<form action="CheckDistance1.php" method="GET">
    <?php
            $cities = array ('Dallas', 'Toronto', 'Boston', 'Nashville', 'Las Vegas', 'San Francisco', 'Washington, DC', 'Miami', 'Pittsburgh');
            for ($i=0; $i < count($cities); $i++){
                print "<input type=\"checkbox\" name=\"prefer[]\"value=$i> $cities[$i]";
                print '<br>';
            }
    ?>
    <br>
    <INPUT TYPE="SUBMIT" VALUE="Submit">
    <INPUT TYPE="RESET" VALUE="Reset">
</form></body></html>