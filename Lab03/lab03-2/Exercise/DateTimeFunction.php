<?php
    function displayDate($dateStr){
        try {
//            $date = new DateTime(($dateStr));
            $date1 = strtotime($dateStr);
            $date= getdate($date1);
            $weekday = $date['weekday'];
            $mon = $date['month'];
            $day= $date['mday'];
            $year = $date['year'];
            print("<td><font color=\"red\" size=\"5\"> $weekday, $mon $day, $year</font></td></tr><br>");
        } catch (Exception $e) {
        }
    }
    function differentDay($date1, $date2){
        $d1 = new DateTime($date1);
        $d2 = new DateTime($date2);
        $diff = $d1->diff($d2);
        print("<br><tr><td><font color='#8b0000' size='5'>Difference of 2 birthday: </font></td>");
        print("<td><font color='#8b0000' size='5'>$diff->y years, $diff->m months, $diff->d days </font></td></tr>");
    }
    function displayOld($name1, $name2, $date1, $date2){
        $d1= getdate(strtotime($date1));
        $d2= getdate(strtotime($date2));
        $old1= 2021 - $d1['year'];
        $old2= 2021 - $d2['year'];
        print("<tr><td><font color='purple' size='5'>--->$name1 is $old1 years old</font></td></tr>");
        print("<tr><td><font color='purple' size='5'>--->$name2 is $old2 years old</font></td></tr>");
    }
?>
<html>
    <head><title>Date time function</title></head>
    <body>
        <form action="DateTimeFunction.php" method="post">
            <font color="blue" size="5">Enter the name and birthday of 2 students: </font>
            <table>
                <tr><td><br>Information of the first student:</td></tr>
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="name1" placeholder="Ta Dinh Son"></td>
                </tr>
                <tr>
                    <td>Birth day :</td>
                    <td><input type="date" name="birth1""></td>
                </tr>

                <tr><td><br>Information of the second student:</td></tr>
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="name2" placeholder="Ta Dinh Son"></td>
                </tr>
                <tr>
                    <td>Birth day :</td>
                    <td><input type="date" name="birth2""></td>
                </tr><br><br>
                <tr><td></td>
                    <td><input type="submit" name="submit" value="Submit"> </td>
                </tr>
            </table>
            <table>
            <?php
            if (isset($_POST['submit'])) {
                $firstStudent= $_POST['name1'];
                $secondStudent = $_POST['name2'];
                print("<tr><td><font color='blue' size='5'>===>Birthday of  $firstStudent: </font></td>");
                displayDate($_POST['birth1']);
                print("<tr><td><font color='blue' size='5'>===>Birthday of  $secondStudent: </font></td>");
                displayDate($_POST['birth2']);
                displayOld($_POST['name1'],$_POST['name2'], $_POST['birth1'], $_POST['birth2']);
                differentDay($_POST['birth1'], $_POST['birth2']);
            }
            ?>
            </table>
        </form>
    </body>
</html>