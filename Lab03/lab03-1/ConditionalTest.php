<html>
    <head>
        <title>
            Conditional test
        </title>
    </head>
    <body>
        <?php
        var_dump($_POST);
        $first = $_POST["fname"];
        $mid = $_POST['mname'];
        $last = $_POST['lname'];
        print("hi $first! your full name is $last $mid $first.<br></br>");
        if ($first = $last){
            print("$first and $last are equal");
        }else if ($first < $last){
            print("$first is less then $last");
        }
        else{
            print("$first is greater than $last");
        }
        print("<br></br>");
        
        $grade1 = $_POST['midterm'];
        $grade2 = $_POST['final'];
        
        $final = (2*$grade1 + 3*$grade2)/5;
        if ($final>89){
            print("your final grade is $final. You got an A. Congratulation!");
        }else if ($final>79){
            print("your final grade is $final. You got an B");
        }elseif ($final>69){
            print("your final grade is $final. You got an C");
        }elseif ($final>59) {
            print("your final grade is $final. You got an D");
        }elseif ($final>=0) {
            print("your final grade is $final. You got an F");
        }
        else {print("your final grade is $final. You got an B");}
        ?>
    </body>
</html>

