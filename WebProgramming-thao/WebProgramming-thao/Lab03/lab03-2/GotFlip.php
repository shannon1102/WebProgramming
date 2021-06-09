<html>
    <head><title>Coin Flip result!</title></head>
    <body>
        <?php
            srand((double) microtime()*10000000);
            $flip  = rand(0,1);
            $pick = $_POST['pick'];
            if ($flip==0 && $pick==0){
                print("The flip = $flip, which is heads!<br>");
                print("<font color='red' size='4'>You got it right!</font><br>");
            }else if ($flip==0 && $pick==1){
                print("The flip = $flip, which is heads!<br>");
                print("<font color='red' size='4'>You got it wrong!</font><br>");
            }else if ($flip==1 && $pick==0){
                print("The flip = $flip, which is tails!<br>");
                print("<font color='red' size='4'>You got it wrong</font><br>");
            }else if ($flip==1 && $pick==1){
                print("The flip = $flip, which is tails!<br>");
                print("<font color='red' size='4'>You got it right</font><br>");
            }
        ?>
    </body>
</html>