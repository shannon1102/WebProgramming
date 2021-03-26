<?php
    function checkNamNhuan($year){
        if ($year%400==0) return 1;
        elseif ($year%4==0){
            if ($year%100!=0) return 1;
            else return 0;
        }
    }

    function getNumberOfDayInMonth($month, $year){
        if ($month==1 || $month==3 || $month==5 ||$month==7 || $month==8||$month==10 ||$month ==12) return 31;
        else if ($month==2){
            if (checkNamNhuan($year)) return 29;
            else return 28;
        }
        else return 30;
    }
?>
<html>
    <head>
        <title>Date time processing!</title>
    </head>
    <body>
        <font size="5" color="red">Enter your name and select date and time for appointment</font>
        <br><!-- comment -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <table>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" name="name"> </td>
                </tr>
                <tr>
                    <td>Date:</td>
                        <td>
                            <select name="month">
                            <?php for ($i=1;$i<=12;$i++){
                                print("<option>$i</option>");
                            } ?>
                            </select>

                            <select name="day">
                            <?php for ($i=1;$i<=31;$i++){
                                print("<option>$i</option>");
                            } ?>
                             </select>

                            <select name="year">
                                <?php for ($i=1999;$i<=3000;$i++){
                                    print("<option>$i</option>");
                                } ?>
                            </select>
                         </td>
                </tr>
                <tr>
                    <td>Time: </td>
                    <td>
                        <select name="hour">
                            <?php for($i=0;$i<=23;$i++){
                               print("<option>$i</option>"); 
                            }?>
                        </select>
                        <select name="min">
                            <?php for($i=0;$i<=59;$i++){
                                print("<option>$i</option>");
                            }?>
                        </select>
                        <select name="second">
                            <?php for($i=0;$i<=59;$i++){
                                print("<option>$i</option>");
                            }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Submit"></td>
                    <td align="left"><input type="reset" value="Reset"></td>
                </tr>
            </table>

        </form>

        <?php
            if (isset($_POST['name'])){
                $name = $_POST['name'];
                $year = $_POST['year'];
                $month = $_POST['month'];
                $day = $_POST['day'];
                $hour = $_POST['hour'];
                $min = $_POST['min'];
                $second = $_POST['second'];
                $numberOfDay= getNumberOfDayInMonth($month, $year);
                if ($hour >12) {
                    $hourIn12=$hour-12;
                } else{
                    $hourIn12 = $hour;
                }

                print("<br>Hi $name!<br>");
                print("You have choose to have an appointment on: $hour:$min:$second, $day/$month/$year<br>");
                print("<br>More information:<br>");
                print("<br>In 12 hours, the time and date is: $hourIn12:$min:$second, $day/$month/$year<br>");
                print("<br>This month has $numberOfDay days<br>");
            }
        ?>
    </body>
</html>