<html>
    <head><title>Coin Flip!</title></head>
    <body>
        <font color="blue" size="5">Please pick heads or tails!</font>
        <form action="GotFlip.php" method="post">
            <?php
                print("<input type='radio' name='pick' value='0'> Heads");
                print("<input type='radio' name='pick' value='1'> Tails <br>");
            ?>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </body>
</html>