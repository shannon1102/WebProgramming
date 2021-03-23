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
      <div class="inforbox">
        <h1>Student information</h1>
        <form action="RespondExecise29.php" method="POST">
            <br>
            Name:   <input class="name" type="text" name="name">
            <br>
            Class:   <input class="class" type="text" name="class">
            <br>
                University:   <input class="university" type="text" name="university">
            <br>
            Email:    <input class="email" type="email" id="email" size="30" maxlength="30" name="email" placeholder="exmaple@gmail.com">
            <br>
            
                Phone Number:  <input type="tel" id="phone" placeholder="0399034070" name="phone" pattern="[0-9]{10}">
            <br>
            Your website:   <input type="url" id="web" placeholder="https://example.com" name="web">
            <br>
            <br
            <b>Hobbies:</b><!-- comment -->
            <br>
                    Soccer<input type="checkbox" name="hobbies[]" value="Soccer">
                    Game<input type="checkbox" name="hobbies[]" value="Game">
                    Race<input type="checkbox" name="hobbies[]" value="Race">
                    Music<input type="checkbox" name="hobbies[]" value="Music">  
            <br>
                Date Of Birth: <input type="date" name="dateofbirth">
            <br> 
                Gender:
                <label class="gender">
                    <input type="radio" name="gender" value="Male">Male</label>
                <label class="gender">
                 <input type="radio" name="gender" value="Female">Female</label>
               
            <br>
            <input type="submit" value="Click to submit">
            <input type="reset" value="Erase and restart">
        </form>
      </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
