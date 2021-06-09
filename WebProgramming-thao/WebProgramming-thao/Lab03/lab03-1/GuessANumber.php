<html>
    <head><title>Guess a number!</title></head><!-- comment -->
    <body>
        <?php
        if (!isset($_GET )){
        srand((double) microtime()*10000000);
        $flip = rand(0,100);
        $count=0;
        print($flip);}
        ?>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <font color="blue">Enter your number: </font>
            <input type="text" name="yourNumber">
        </form>
        <?php
        if (array_key_exists("yourNumber", $_GET )){
            var_dump($_GET);
            $count=$count+1;
            $number =$_GET["yourNumber"];
            if ($number == $flip) {print("You are correct!");}
            else if ($number <$flip) {print("Wrong. Please try a higher number. You have guessed $count time!");}
            else {print("Wrong. Please try a lower number. You have guessed $count time!");}
        }?>
    </body>
</html>