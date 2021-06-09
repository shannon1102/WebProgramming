<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
        // put your code here
        $name = $_POST["name"];
        $class = $_POST["class"];
        $university = $_POST["university"];
        $email = $_POST["email"];
        $hobbies = $_POST["hobbies"];
        $gender = $_POST["gender"];
//        print $gender;
        $color = $_POST["color"];
        $dateOfBirth = $_POST["dateofbirth"];
        $phone = $_POST["phone"];
        $web = $_POST["web"];

        print `<div class="result" style="background-image: url('https://image.freepik.com/free-photo/watercolor-stained-white-background_23-2148153236.jpg');">`;
        print "<p>Name: <b>$name</b></p><br>";
        print "<p>Class: <b>$class</b></p><br>";
        print "<p>Univeristy:<b>$university</b></p><br>";
        print "<p>Email: <b>$email</b></p><br>";
        print "<p>Web: <b>$web</b></p><br>";
        if(!empty($hobbies)) {   
            print "Hobbies : <br>";
        foreach($hobbies as $value){
            print "  - ".$value.'<br/>';
            }
        }
        if($gender == "Male") {
             print "<p>Gender:<b>Male</b></p><br>";
        } else if ($gender == "Female") {
             print "<p>Gender:<b>Female</b></p><br>";
        }
        print "<p>Date Of Birth: <b>$dateOfBirth</b></p><br>";
        print "<p>Phone: <b>$phone</b></p><br>";
        print `</div>`;
        ?>
    </body>
</html>
