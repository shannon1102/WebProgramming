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
    </head>
    <body>
        <font size=5>Thank you : Got you Input.</font> 
        <?php
        // put your code here
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        print("<br> Your email address is $email");
        print("<br> Contact preference is $contact");
        ?>
    </body>
</html>
