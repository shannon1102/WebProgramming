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
//if ($final>89){
//    print("your final grade is $final. You got an A. Congratulation!");
//}else if ($final>79){
//    print("your final grade is $final. You got an B");
//}elseif ($final>69){
//    print("your final grade is $final. You got an C");
//}elseif ($final>59) {
//    print("your final grade is $final. You got an D");
//}elseif ($final>=0) {
//    print("your final grade is $final. You got an F");
//}
//else {print("your final grade is $final. You got an B");}
if ($final >89){
    printf("Your final grade is %.1f. You got an A. Congratulation!",$final);
}elseif ($final>79){
    printf("Your final grade is %.1f. You got an B",$final);
}elseif ($final>69){
    printf("Your final grade is %.1f. You got an C",$final);
}elseif ($final>59){
    printf("Your final grade is %.1f. You got an D",$final);
}elseif ($final>=0){
    printf("Your final grade is %.1f. You got an F",$final);
}else{
    printf("grade less than 0. Final grade = %.1f",$final);
}
?>
</body>
</html>

