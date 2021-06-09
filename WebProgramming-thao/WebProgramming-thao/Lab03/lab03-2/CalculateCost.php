<html>
    <body>
        <font>You estimated carpet costs</font>
        <?php
        $carpet_cost=0; $install_cost=0;
        function carpet_cost($width , $length, $grade){
            global $carpet_cost;
            if ($width>0 && $length>0){
                if ($grade==1){
                    $carpet_cost = $width*$length*4.99;
                    return 1;
                }elseif ($grade==2){
                    $carpet_cost = $width*$length*3.99;
                    return 1;
                }else{
                    print("Unknown carpet grade = $grade");
                    return 0;
                }
            }
            else return 0;
        }
        $width = $_POST['width']; $length=$_POST['length']; $grade=$_POST['grade'];
        $ret=carpet_cost($width,$length,$grade);
        if ($ret){
            $room_size=$width *$length;
            $totalCost = $carpet_cost*6;
            print("<br>Total square feet = $room_size");
            print("<br>Carpet grade = $grade");
            print("<br>Carpet cost = $carpet_cost");
            print("<br>Total cost estimate (installed) = \$$totalCost");
        }else{
            print("Illegal value received ");
        }
        ?>
    </body>
</html>