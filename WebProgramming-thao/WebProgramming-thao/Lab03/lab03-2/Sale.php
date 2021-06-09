<html><head><title>Our shop</title></head>
    <body>
    <font size="4" color="blue">
        <?php
            $today = date('1,F d,Y');
            print("Welcome on $today to our huge blowout sale!");
            $month  = date('m');
            $year = date('Y');
            $dayOfYear = date('z');
            if ($month==12 &&$year==2001){
                $dayLeft = (365-$dayOfYear+10);
                print("There are $dayLeft sales day left");
            }else if($month==1&&$year=2002){
                if ($dayOfYear<=10){
                    $dayLeft=10-$dayOfYear;
                    print("<br>There are $dayLeft sales days left");
                }else{
                    print("<br>Sorry! Our sale is over");
                }
            }else{
                print("<br>Sorry! Our sale is over");
            }
            print("<br>Our Sale Ends January 10, 2002")
        ?>
    </font>
    </body>
</html>