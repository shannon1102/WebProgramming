<html>
    <head>
        <title>Square cube</title>
    </head>
    <body>
        <font size="5" color="red"> Generate Square and Cube Values </font>
        <br><!-- comment -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET"> 
            <?php
            if (array_key_exists("start", $_GET)){
                $start = $_GET["start"];
                $end=$_GET["end"];}
            else{
                $start=0; $end=0;
            }
            ?>
            <table>
                <tr>
                    <td>Select Start Number:</td>
                    <td><select name="start">
                            <?php for ($i=0;$i<=10;$i++){
                                if ($start==$i){
                                    print("<option selected>$i</option>");
                                }
                                else{
                                    print("<option>$i</option>");
                                }
                            } ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Select End Number: </td>
                    <td>
                        <select name="end">
                            <?php for($i=0;$i<=20;$i++){
                               if ($end==$i){
                                    print("<option selected>$i</option>");
                                }
                                else{
                                    print("<option>$i</option>");
                                } 
                            }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Submit"></td>
                    <td align="left"><input type="reset" value="Reset"></td>
                </tr>
            </table>
            <table>
                <tr><th>Number</th><th>Square</th><th>Cube</th></tr>
                <?php
                    if (array_key_exists("start", $_GET)){
                        $start = $_GET["start"];
                        $end=$_GET["end"];
                        $i=$start;
                        while($i<=$end){
                            $sqr=$i*$i;
                            $cube =$sqr*$i;
                            print("<tr><td>$i</td><td>$sqr</td><td>$cube</td></tr>");
                            $i=$i+1;
                        }
                    }?>
            </table>
        </form>
    </body>
</html>