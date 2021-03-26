<html>
    <head>
        <title>
            Conditional test
        </title>
    </head>
    <body>
        <?php
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
        
        $grade1 = $_POST['midTerm'];
        $grade2 = $_POST['final'];
        
        $final = (2*$grade1 + 3*$grade2)/5;
        if ($final>89){
            print("your final grade is $final. You got a A. Congratulation!");
            $rate="A";
        }else if ($final>79){
            print("your final grade is $final. You got a B");
            $rate="B";
        }elseif ($final>69){
            print("your final grade is $final. You got a C");
            $rate="C";
        }elseif ($final>59) {
            print("your final grade is $final. You got a D");
            $rate="D";
        }elseif($final>39){
            print("your final grade is $final. You got a E");
            $rate="E";
        } elseif ($final>=0) {
            print("your final grade is $final. You got a F");
            $rate="F";
        }
        else {
            print("your final grade is $final. You got an B");
            $rate="Illegal";
        }

        print("<br><br>");
        switch ($rate){
            case "A": print("Excellent!"); break;
            case "B": print("Good!"); break;
            case "C": print("Not bad!"); break;
            case "D": print("Normal!"); break;
            case "E":
            case "F": print("You have to try again!"); break;
            default: print("Illegal grade");
        }
        ?>
    </body>
</html>

